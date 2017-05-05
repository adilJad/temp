<?php

namespace Acme\ApiBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Activity
 *
 * @ORM\Table(name="pricinggroup")
 * @ORM\Entity(repositoryClass="Acme\FrontBundle\Repository\PricinggroupRepository")
 * @ORM\Entity(repositoryClass="Acme\FrontBundle\Repository\CategoryRepository")
 */

class Pricinggroup {

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="minPersInter", type="integer" , nullable=true)
     */
    private $minPerson;

    /**
     * @var integer
     *
     * @ORM\Column(name="maxPersInter", type="integer")
     */
    private $maxPerson;


    /**
     * @var integer
     *
     * @ORM\Column(name="priceInterval", type="integer")
     */
    private $priceInterval;


    
    public function __construct() {
        $this->categories = new \Doctrine\Common\Collections\ArrayCollection();
        $this->enabled = true;
        $this->created = new \DateTime('now');
        $this->modified = new \DateTime('now');
        $this->published = 0;
    }

    function getId() {
        return $this->id;
    }

    function getMaxPerson() {
        return $this->maxPerson;
    }

    function getMinPerson() {
        return $this->minPerson;
    }

    function getPriceInterval() {
        return $this->priceInterval;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setMaxPerson($maxPerson) {
        $this->maxPerson = $maxPerson;
    }

    function setMinPerson($minPerson) {
        $this->minPerson = $minPerson;
    }

    function setPriceInterval($priceInterval) {
        $this->priceInterval = $priceInterval;
    }

 public function __toString()
    {
        if($this->getMinPerson()){
            return ' de '. $this->getMinPerson() .' à '.$this->getMaxPerson().' : '.$this->getPriceInterval() ;
        }else{
            return $this->getMaxPerson().' : '.$this->getPriceInterval() ;
        }

    }
    
    
    
}
