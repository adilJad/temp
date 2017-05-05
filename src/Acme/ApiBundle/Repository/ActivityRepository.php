<?php

namespace Acme\ApiBundle\Repository;

use Doctrine\ORM\EntityRepository;

class ActivityRepository extends \Doctrine\ORM\EntityRepository {

    public function allResult() {

        return $this->createQueryBuilder('a')
                        ->where('a.enabled = 1')
                        ->andWhere('a.published = 1')
                        ->orderBy('a.id', 'DESC')
                        ->getQuery()
                        ->getResult();
    }

    public function actSimilary($idA, $idC) {
        $parameters = array('idC' => $idC, 'idA' => $idA);
        return $this->createQueryBuilder('a')
                        ->setMaxResults(5)
                        ->orderBy('a.id', 'DESC')
                        ->where('a.enabled =  1')
                        ->andWhere('a.published = 1')
                        ->andWhere('a.id != :idA')
                        ->innerJoin('a.category', 'c')
                        ->andWhere('c  =  :idC')
                        ->setParameters($parameters)
                        ->getQuery()
                        ->getResult();
    }

    public function filtre($persons, $idsCat, $prices, $durations, $group, $privated, $promotion) {
        if ($group == "false" && $privated == "false" || $group == "true" && $privated == "true") {
            $type = ["privateLot", "privatePerson", "group"];
        } if ($group == "true" && $privated == "false") {
            $type = ["group"];
        } if ($group == "false" && $privated == "true") {
            $type = ["privateLot", "privatePerson"];
        }
        if ($promotion == "true") {
            $startPromo = new \DateTime('now');
            $endPromo = new \DateTime('now');
        } else {
            $startPromo = new \DateTime('2200-01-01');
            $endPromo = new \DateTime('2000-01-01');
        }

        if (empty($durations)) {
            $durations = array("0,1000");
        }
        if (!empty($idsCat)) {
            $parameters = array(
                "persons" => $persons,
                'idsCat' => $idsCat,
                'startPromo' => $startPromo,
                'endPromo' => $endPromo,
                "type" => $type,
            );
            $activities = $this->createQueryBuilder('e')
                    ->where('e.enabled = 1')
                    ->andWhere('e.published = 1')
                    ->orderBy('e.id', 'DESC')
                    ->innerJoin('e.category', 'g')
                    ->andWhere('g IN  (:idsCat)')
                    ->andWhere('e.maxPersons >= :persons ')
                    ->andWhere(':startPromo > e.promotionStart')
                    ->andWhere(':endPromo < e.promotionEnd')
                    ->andWhere('e.pricingType IN (:type)')
                    ->setParameters($parameters)
                    ->setMaxResults(8)
                    ->getQuery()
                    ->getResult();
        } else {
            $parameters = array(
                "persons" => $persons,
                'startPromo' => $startPromo,
                'endPromo' => $endPromo,
                "type" => $type,
            );
            $activities = $this->createQueryBuilder('e')
                    ->where('e.enabled = 1')
                    ->andWhere('e.published = 1')
                    ->orderBy('e.id', 'DESC')
                    ->andWhere('e.maxPersons >= :persons')
                    ->andWhere('e.pricingType IN  (:type)')
//                    ->setParameter('persons', $persons)
                    ->andWhere(':startPromo > e.promotionStart')
                    ->andWhere(':endPromo < e.promotionEnd')
                    ->setMaxResults(8)
                    ->setParameters($parameters)
                    ->getQuery()
                    ->getResult();
        }
        $i = 0;
        foreach ($activities as $activity) {
            $unsetD = 0;
            $unsetP = 0;
            foreach ($durations as $duration) {
                $durtab = explode(",", $duration);
                if ($activity->getDuration() >= (int) $durtab[0] && $activity->getDuration() <= (int) $durtab[1]) {
                    $unsetD += 1;
                }
            }
            if ($unsetD <= 0) {
                unset($activities[$i]);
            }
            if (!empty($prices)) {
//                foreach ($prices as $price) {
//                    $pricetab = explode(",", $price);
                if ($activity->getPricingType() == "group") {
//                        if ($activity->getPpersAdult() >= $pricetab[0] && $activity->getPpersAdult() <= $pricetab[1]) {
                    if ($activity->getPpersAdult() > $prices) {
//                            $unsetP += 1;
                        unset($activities[$i]);
                    }
                } else {
                    foreach ($activity->getPricinggroups() as $pricing) {
                        if ($pricing->getPriceInterval() > $prices) {
//                                $unsetP += 1;
                            unset($activities[$i]);
                        }
                    }
                }
//                }
//                if ($unsetP <= 0) {
//                    unset($activities[$i]);
//                }
            }
            $i++;
        }

        return $activities;
    }

    public function filtreLoadMore($persons, $idsCat, $prices, $durations, $group, $privated, $promotion, $offset) {
        if ($group == "false" && $privated == "false" || $group == "true" && $privated == "true") {
            $type = ["privateLot", "privatePerson", "group"];
        } if ($group == "true" && $privated == "false") {
            $type = ["group"];
        } if ($group == "false" && $privated == "true") {
            $type = ["privateLot", "privatePerson"];
        }
        if ($promotion == "true") {
            $startPromo = new \DateTime('now');
            $endPromo = new \DateTime('now');
        } else {
            $startPromo = new \DateTime('2200-01-01');
            $endPromo = new \DateTime('2000-01-01');
        }

        if (empty($durations)) {
            $durations = array("0,1000");
        }
        if (!empty($idsCat)) {
            $parameters = array(
                "persons" => $persons,
                'idsCat' => $idsCat,
                'startPromo' => $startPromo,
                'endPromo' => $endPromo,
                "type" => $type,
            );
            $activities = $this->createQueryBuilder('e')
                    ->where('e.enabled = 1')
                    ->andWhere('e.published = 1')
                    ->orderBy('e.id', 'DESC')
                    ->innerJoin('e.category', 'g')
                    ->andWhere('g IN  (:idsCat)')
                    ->andWhere('e.maxPersons >= :persons ')
                    ->andWhere(':startPromo > e.promotionStart')
                    ->andWhere(':endPromo < e.promotionEnd')
                    ->andWhere('e.pricingType IN (:type)')
                    ->setParameters($parameters)
                    ->setMaxResults(4)
                    ->setFirstResult($offset)
                    ->getQuery()
                    ->getResult();
        } else {
            $parameters = array(
                "persons" => $persons,
                'startPromo' => $startPromo,
                'endPromo' => $endPromo,
                "type" => $type,
            );
            $activities = $this->createQueryBuilder('e')
                    ->where('e.enabled = 1')
                    ->andWhere('e.published = 1')
                    ->orderBy('e.id', 'DESC')
                    ->andWhere('e.maxPersons >= :persons')
                    ->andWhere('e.pricingType IN  (:type)')
                    ->andWhere(':startPromo > e.promotionStart')
                    ->andWhere(':endPromo < e.promotionEnd')
                    ->setMaxResults(4)
                    ->setFirstResult($offset)
                    ->setParameters($parameters)
                    ->getQuery()
                    ->getResult();
        }
        $i = 0;
        foreach ($activities as $activity) {
            $unsetD = 0;
            foreach ($durations as $duration) {
                $durtab = explode(",", $duration);
                if ($activity->getDuration() >= (int) $durtab[0] && $activity->getDuration() <= (int) $durtab[1]) {
                    $unsetD += 1;
                }
            }
            if ($unsetD <= 0) {
                unset($activities[$i]);
            }
            if (!empty($prices)) {
                if ($activity->getPricingType() == "group") {
                    if ($activity->getPpersAdult() > $prices) {
                        unset($activities[$i]);
                    }
                } else {
                    foreach ($activity->getPricinggroups() as $pricing) {
                        if ($pricing->getPriceInterval() > $prices) {
                            unset($activities[$i]);
                        }
                    }
                }
            }
            $i++;
        }

        return $activities;
    }

    public function actInPromotion() {
        $parameters = array(
//                'startPromo' => $startPromo,
        );
        return $this->createQueryBuilder('e')
                        ->where('e.enabled = 1')
                        ->andWhere('e.published = 1')
                        ->orderBy('e.id', 'DESC')
//                    ->andWhere(':startPromo > e.promotionStart')
//                    ->andWhere(':endPromo < e.promotionEnd')
//                    ->setParameters($parameters)
                        ->setMaxResults(6)
                        ->getQuery()
                        ->getResult();
    }

    public function actByTag($idTag) {
        return $this->createQueryBuilder('e')
                        ->innerJoin('e.tags', 't')
                        ->andWhere('t =  :idT')
                        ->orderBy('e.id', 'DESC')
                        ->setParameter('idT', $idTag)
                        ->getQuery()
                        ->getResult();
    }

    public function nbActByTags($tags) {
        return count($this->createQueryBuilder('e')
                        ->orderBy('e.id', 'DESC')
                        ->innerJoin('e.tags', 't')
                        ->where('t =  :tags')
                        ->setParameter('tags', $tags)
                        ->getQuery()
                        ->getResult());
    }

    public function nbActsByCat($category) {
        return count($this->createQueryBuilder('a')
                        ->orderBy('a.id', 'DESC')
                        ->innerJoin('a.category', 'g')
                        ->where('g =  :category')
                        ->setParameter('category', $category)
                        ->getQuery()
                        ->getResult());
    }

    public function ActsByUser($id) {
        return $this->createQueryBuilder('a')
                        ->where('e.published = 1')
//                        ->andWhere('e.enabled = 1')
                        ->orderBy('a.id', 'DESC')
                        ->innerJoin('a.user', 'u')
                        ->where('u =  :user')
                        ->setParameter('user', $id)
                        ->getQuery()
                        ->getResult();
    }

    public function getNbRow($tab = null) {
        return $this->createQueryBuilder($tab)
                        ->select('COUNT(' . $tab . ')')
                        ->getQuery()
                        ->getSingleScalarResult();
    }

    public function getNbviewByActs($act) {
        return count($this->createQueryBuilder('e')
                        ->orderBy('e.id', 'DESC')
                        ->where('e.status like :v')
                        ->setParameter('v', "VERIFIED")
                        ->getQuery()
                        ->getResult());
    }

}
