<?php

namespace Acme\ApiBundle\Repository;

/**
 * OfferRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class OrderRepository extends \Doctrine\ORM\EntityRepository {

    public function orderByUser($user) {

        return $this->createQueryBuilder('w')
                        ->orderBy('w.id', 'DESC')
                        ->innerJoin('w.user', 'u')
                        ->where('u =  :user')
                        ->setParameter('user', $user)
                        ->getQuery()
                        ->getResult();
    }

    public function getNbRow($tab = null) {
        return $this->createQueryBuilder($tab)
                        ->select('COUNT(' . $tab . ')')
                        ->where($tab . '.status IN (:status)')
                        ->setParameter('status', 'VERIFIED')
                        ->getQuery()
                        ->getSingleScalarResult();
    }

    public function getNbRowPAN($tab = null) {
        return $this->createQueryBuilder($tab)
                        ->select('COUNT(' . $tab . ')')
                        ->where($tab . '.status IS NULL')
                        ->getQuery()
                        ->getSingleScalarResult();
    }

    public function getNbRowPayement($tab = null) {
        return $this->createQueryBuilder($tab)
                        ->select('SUM(' . $tab . '.total)')
                        ->where($tab . '.status IN (:status)')
                        ->setParameter('status', 'VERIFIED')
                        ->getQuery()
                        ->getSingleScalarResult();
    }

    public function getNbOrderByActs($act) {
        return count($this->createQueryBuilder('e')
                        ->orderBy('e.id', 'DESC')
                        ->innerJoin('e.activity', 't')
                        ->where('t =  :activity')
                        ->andWhere('e.status like :v')
                        ->setParameter('activity', $act)
                        ->setParameter('v', "VERIFIED")
                        ->getQuery()
                        ->getResult());
    }

    public function getNbOrderByMethod($m) {
        return count($this->createQueryBuilder('e')
                        ->orderBy('e.id', 'DESC')
                        ->where('e.status like :v')
                        ->setParameter('v', "VERIFIED")
                        ->andWhere('e.paymentMeth like :m')
                        ->setParameter('m', $m)
                        ->getQuery()
                        ->getResult());
    }

    public function getBookings($status, $dateBook, $user) {
        $now = new \DateTime('now');
        $result = array();
        $bookings = $this->createQueryBuilder('w')
                ->orderBy('w.id', 'DESC')
                ->innerJoin('w.activity', 'a')
                ->where('a.user =  :user')
                ->andWhere('w.status IN (:status)')
                ->setParameter('user', $user)
                ->setParameter('status', $status)
                ->getQuery()
                ->getResult();
//        dump($dateBook);die;
        if ($dateBook == "0" || $dateBook == "3") {
            $result = $bookings;
        } elseif ($dateBook == "1") {
            foreach ($bookings as $entity) {
                if ($now < $entity->getDateStart()) {
                    array_push($result, $entity);
                }
            }
        } elseif ($dateBook == "2") {
            foreach ($bookings as $entity) {
                if ($now > $entity->getDateStart()) {
                    array_push($result, $entity);
                }
            }
        }
        return $result;
    }

}
?>