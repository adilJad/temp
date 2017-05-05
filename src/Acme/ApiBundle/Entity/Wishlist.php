<?php

namespace Acme\ApiBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Event
 *
 * @ORM\Table(name="wishlist")
 * @ORM\Entity(repositoryClass="Acme\ApiBundle\Repository\WishlistRepository")
 */
class Wishlist {

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="Acme\ApiBundle\Entity\User")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    private $user;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created", type="date")
     */
    private $created;

    /**
     * @ORM\ManyToOne(targetEntity="Acme\ApiBundle\Entity\Activity")
     */
    private $activity;

    /**
     * Constructor
     */
    public function __construct() {
        $this->created = new \DateTime('now');
    }

    function getId() {
        return $this->id;
    }

    function getUser() {
        return $this->user;
    }

    function getName() {
        return $this->name;
    }

    function getCreated() {
        return $this->created;
    }

    function setId($id) {
        $this->id = $id;
    }

    /**
     * Set user
     *
     * @param \Acme\UserBundle\Entity\User $user
     *
     * @return Event
     */
    public function setUser(\Acme\UserBundle\Entity\User $user = null) {
        $this->user = $user;

        return $this;
    }

    function setName($name) {
        $this->name = $name;
    }

    function setCreated(\DateTime $created) {
        $this->created = $created;
    }

    /**
     * Set activity
     *
     * @param \Acme\ApiBundle\Entity\Activity $activity
     *
     * @return Event
     */
    public function setActivity(\Acme\ApiBundle\Entity\Activity $activity = null) {
        $this->activity = $activity;

        return $this;
    }

    function getActivity() {
        return $this->activity;
    }



}
?>