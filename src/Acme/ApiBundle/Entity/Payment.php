<?php

namespace Acme\ApiBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Order
 *
 * @ORM\Table(name="payment")
 * @ORM\Entity(repositoryClass="Acme\ApiBundle\Repository\PaymentRepository")
 */
class Payment {

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
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id" )
     */
    private $user;

    /**
     * @var string
     *
     * @ORM\Column(name="total", type="string" , length=255, nullable=true)
     */
    private $total;
   
    
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created", type="datetime", nullable=true)
     */
    private $created;
    
    /**
     * @var string
     *
     * @ORM\Column(name="paymentId", type="string" , length=255, nullable=true)
     */
    private $paymentId;
    
    /**
     * @var string
     *
     * @ORM\Column(name="paymentEmail", type="string" , length=255, nullable=true)
     */
    private $paymentEmail;
    
    
    /**
     * @var string
     *
     * @ORM\Column(name="paymentMeth", type="string" , length=255, nullable=true)
     */
    private $paymentMeth;    

    
    /**
     * @var string
     *
     * @ORM\Column(name="status", type="string" , length=255, nullable=true)
     */
    private $status;

    
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

    function getTotal() {
        return $this->total;
    }

    function getPaymentId() {
        return $this->paymentId;
    }

    function getPaymentEmail() {
        return $this->paymentEmail;
    }

    function getPaymentMeth() {
        return $this->paymentMeth;
    }

    function getStatus() {
        return $this->status;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setUser($user) {
        $this->user = $user;
    }

    function setTotal($total) {
        $this->total = $total;
    }

    function setPaymentId($paymentId) {
        $this->paymentId = $paymentId;
    }

    function setPaymentEmail($paymentEmail) {
        $this->paymentEmail = $paymentEmail;
    }

    function setPaymentMeth($paymentMeth) {
        $this->paymentMeth = $paymentMeth;
    }

    function setStatus($status) {
        $this->status = $status;
    }

    function getCreated() {
        return $this->created;
    }

    function setCreated(\DateTime $created) {
        $this->created = $created;
    }
}
?>