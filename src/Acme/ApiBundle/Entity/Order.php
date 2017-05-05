<?php

namespace Acme\ApiBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Order
 *
 * @ORM\Table(name="order")
 * @ORM\Entity(repositoryClass="Acme\ApiBundle\Repository\OrderRepository")
 */
class Order {

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
     * @ORM\ManyToOne(targetEntity="Acme\ApiBundle\Entity\Activity")
     * @ORM\JoinColumn(name="activity_id", referencedColumnName="id" )
     */
    private $activity;

    /**
     * @var string
     *
     * @ORM\Column(name="nbC", type="integer")
     */
    private $nbC;

    /**
     * @var string
     *
     * @ORM\Column(name="nbA", type="integer" )
     */
    private $nbA;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateStart", type="datetime", nullable=true)
     */
    private $dateStart;

    /**
     * @var string
     *
     * @ORM\Column(name="timeStart", type="string" , length=255, nullable=true)
     */
    private $timeStart;

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
     * @ORM\Column(name="ref", type="string" , length=255, nullable=true)
     */
    private $ref;
    
    
    /**
     * @var string
     *
     * @ORM\Column(name="paymentId", type="string" , length=255, nullable=true)
     */
    private $paymentId;
    
    
    /**
     * @var string
     *
     * @ORM\Column(name="paymentDate", type="string" , length=255, nullable=true)
     */
    private $paymentDate;
    
    
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
     * @ORM\Column(name="invoiceId", type="string" , length=255, nullable=true)
     */
    private $invoiceId;
    
    /**
     * @var string
     *
     * @ORM\Column(name="status", type="string" , length=255, nullable=true)
     */
    private $status;
    
    
    /**
     * @var string
     *
     * @ORM\Column(name="hebergement", type="text", nullable=true)
     */
    private $hebergement;
    
    
    /**
     * @var string
     *
     * @ORM\Column(name="message", type="text", nullable=true)
     */
    private $message;
    
    /**
     * Constructor
     */
    public function __construct() {
        $this->created = new \DateTime('now');
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set nbC
     *
     * @param integer $nbC
     *
     * @return Order
     */
    public function setNbC($nbC) {
        $this->nbC = $nbC;

        return $this;
    }

    /**
     * Get nbC
     *
     * @return integer
     */
    public function getNbC() {
        return $this->nbC;
    }

    /**
     * Set nbA
     *
     * @param integer $nbA
     *
     * @return Order
     */
    public function setNbA($nbA) {
        $this->nbA = $nbA;

        return $this;
    }

    /**
     * Get nbA
     *
     * @return integer
     */
    public function getNbA() {
        return $this->nbA;
    }

    /**
     * Set dateStart
     *
     * @param \DateTime $dateStart
     *
     * @return Order
     */
    public function setDateStart($dateStart) {
        $this->dateStart = $dateStart;

        return $this;
    }

    /**
     * Get dateStart
     *
     * @return \DateTime
     */
    public function getDateStart() {
        return $this->dateStart;
    }

    /**
     * Set timeStart
     *
     * @param string $timeStart
     *
     * @return Order
     */
    public function setTimeStart($timeStart) {
        $this->timeStart = $timeStart;

        return $this;
    }

    /**
     * Get timeStart
     *
     * @return string
     */
    public function getTimeStart() {
        return $this->timeStart;
    }

    /**
     * Set activity
     *
     * @param \Acme\ApiBundle\Entity\Activity $activity
     *
     * @return Order
     */
    public function setActivity(\Acme\ApiBundle\Entity\Activity $activity = null) {
        $this->activity = $activity;

        return $this;
    }

    /**
     * Get activity
     *
     * @return \Acme\ApiBundle\Entity\Activity
     */
    public function getActivity() {
        return $this->activity;
    }

    function getTotal() {
        return $this->total;
    }

    function setTotal($total) {
        $this->total = $total;
    }

    /**
     * Set user
     *
     * @param \Acme\UserBundle\Entity\User $user
     *
     * @return Invoice
     */
    public function setUser(\Acme\UserBundle\Entity\User $user = null) {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \Acme\UserBundle\Entity\User
     */
    public function getUser() {
        return $this->user;
    }

    function getCreated() {
        return $this->created;
    }

    function setCreated(\DateTime $created) {
        $this->created = $created;
    }

    function getRef() {
        return $this->ref;
    }

    function setRef($ref) {
        $this->ref = $ref;
    }

    function getInvoiceId() {
        return $this->invoiceId;
    }

    function setInvoiceId($invoiceId) {
        $this->invoiceId = $invoiceId;
    }

    function getPaymentId() {
        return $this->paymentId;
    }

    function getPaymentDate() {
        return $this->paymentDate;
    }

    function getPaymentEmail() {
        return $this->paymentEmail;
    }

    function getPaymentMeth() {
        return $this->paymentMeth;
    }

    function setPaymentId($paymentId) {
        $this->paymentId = $paymentId;
    }

    function setPaymentDate($paymentDate) {
        $this->paymentDate = $paymentDate;
    }

    function setPaymentEmail($paymentEmail) {
        $this->paymentEmail = $paymentEmail;
    }

    function setPaymentMeth($paymentMeth) {
        $this->paymentMeth = $paymentMeth;
    }

    function getStatus() {
        return $this->status;
    }

    function setStatus($status) {
        $this->status = $status;
    }
    
    function getHebergement() {
        return $this->hebergement;
    }

    function getMessage() {
        return $this->message;
    }

    function setHebergement($hebergement) {
        $this->hebergement = $hebergement;
    }

    function setMessage($message) {
        $this->message = $message;
    }



}
?>