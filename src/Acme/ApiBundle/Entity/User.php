<?php
/**
 * @Author: jad
 * @Date:   2017-05-03 18:51:48
 * @Last Modified by:   jad
 * @Last Modified time: 2017-05-05 17:42:10
 */

namespace Acme\ApiBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Acme\UserBundle\Repository;
/**
 * User
 *
 * @ORM\Entity(repositoryClass="Acme\ApiBundle\Repository\UserRepository")
 * @ORM\Table("user")
 * @Vich\Uploadable
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(name="firstname", type="string", length=255 , nullable=true)
     */
    protected $firstname;

    /**
     * @ORM\Column(name="lastname", type="string", length=255 , nullable=true)
     */
    protected $lastname;

    /**
     * @ORM\Column(type="string", length=255 , nullable=true)
     * @var string
     */
    private $image;

    /**
     * @Vich\UploadableField(mapping="user_images", fileNameProperty="image")
     * @var File
     */
    private $imageFile;

    /**
     * @ORM\Column(name="phone", type="string", length=255 , nullable=true)
     */
    protected $phone;

    /**
     * @ORM\Column(name="address", type="string", length=255 , nullable=true)
     */
    protected $address;

    /**
     * @ORM\Column(name="country", type="string", length=255 , nullable=true)
     */
    protected $country;

    /**
     * @ORM\Column(name="city", type="string", length=255 , nullable=true)
     */
    protected $city;

    /**
     * @ORM\Column(name="zipcode", type="string", length=255 , nullable=true)
     */
    protected $zipcode;

    /**
     * @ORM\Column(name="website", type="string", length=255 , nullable=true)
     */
    protected $website;

    /**
     * @ORM\OneToMany(targetEntity="Acme\ApiBundle\Entity\Activity", mappedBy="user")
     */
    private $activities;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created", type="date")
     */
    private $created;

    /**
     * @var bool
     *
     * @ORM\Column(name="archive", type="boolean" , nullable=true)
     */
    private $archive;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="modified", type="date")
     */
    private $modified;

    /**
     * @ORM\Column(name="wisheds", type="integer")
     */
    protected $wisheds;

    /**
     * @var string
     *
     * @ORM\Column(name="typeAgency", type="array",  nullable=true)
     */
    private $typeAgency;

    /**
     * @var string
     *
     * @ORM\Column(name="servicesAgency", type="array",  nullable=true)
     */
    private $servicesAgency;

    /**
     * @var string
     *
     * @ORM\Column(name="aboutWtd", type="array",  nullable=true)
     */
    private $aboutWtd;

    /**
     * @var string
     *
     * @ORM\Column(name="notifSms", type="array",  nullable=true)
     */
    private $notifSms;

    public function __construct() {
        parent::__construct();
        $this->created = new \DateTime('now');
        $this->modified = new \DateTime('now');
        $this->roles = array('ROLE_USER');
        $this->newsletter = true;
        $this->wisheds = 0;
        $this->activities = new ArrayCollection();
    }

    /**
     * Add activities
     *
     * @param \Acme\ApiBundle\Entity\Activity $activity
     *
     * @return User
     */
    public function addActivity(\Acme\ApiBundle\Entity\Activity $activity) {
        $this->activities[] = $activity;

        return $this;
    }

    /**
     * Remove activities
     *
     * @param \Acme\ApiBundle\Entity\Activity $activity
     */
    public function removeEtablissement(\Acme\ApiBundle\Entity\Activity $activity) {
        $this->activities->removeElement($activity);
    }

    /**
     * Get activities
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getActivities() {
        return $this->activities;
    }

    function getId() {
        return $this->id;
    }

    function getPhone() {
        return $this->phone;
    }

    function getAddress() {
        return $this->address;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setPhone($phone) {
        $this->phone = $phone;
    }

    function setAddress($address) {
        $this->address = $address;
    }

    public function setImageFile(File $image = null) {
        $this->imageFile = $image;

        if ($image) {
            $this->modified = new \DateTime('now');
        }
    }

    public function getImageFile() {
        return $this->imageFile;
    }

    public function setImage($image) {
        $this->image = $image;
    }

    public function getImage() {
        return $this->image;
    }

    /**
     * Set firstname
     *
     * @param string $firstname
     *
     * @return User
     */
    public function setFirstname($firstname) {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * Get firstname
     *
     * @return string
     */
    public function getFirstname() {
        return $this->firstname;
    }

    /**
     * Set lastname
     *
     * @param string $lastname
     *
     * @return User
     */
    public function setLastname($lastname) {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * Get lastname
     *
     * @return string
     */
    public function getLastname() {
        return $this->lastname;
    }

    /**
     * Set created
     *
     * @param boolean $created
     *
     * @return User
     */
    public function setCreated($created) {
        $this->created = $created;

        return $this;
    }

    /**
     * Get created
     *
     * @return string
     */
    public function getCreated() {
        return $this->created;
    }

    /**
     * Set modified
     *
     * @param boolean $modified
     *
     * @return User
     */
    public function setModified($modified) {
        $this->modified = $modified;

        return $this;
    }

    /**
     * Get modified
     *
     * @return string
     */
    public function getModified() {
        return $this->modified;
    }

    public function setEmail($email) {
        $this->email = $email;
        $this->username = $email;
    }

    public function setEmailCanonical($emailCanonical) {
        $this->emailCanonical = $emailCanonical;
        $this->usernameCanonical = $emailCanonical;
    }

    public function getNameComplet() {
        return $this->firstname . " " . $this->lastname;
    }

    public function __toString() {
        return $this->firstname . " " . $this->lastname;
    }

    /**
     * Get roles
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getRoles() {
        if (isset($_SERVER['PATH_INFO'])) {
            $path_info = $_SERVER['PATH_INFO'];
        } else {
            $path_info = "";
        }
        $admin_prod = substr($_SERVER['REQUEST_URI'], 0, 7);
        $admin_dev = substr($_SERVER['REQUEST_URI'], 12, 7);

        if ($path_info == "/admin/" || $admin_prod == "/admin/" || $admin_dev == "/admin/") {
            if (empty($this->roles[0])) {
                $this->roles[0] = "ROLE_USER";
            }
            return $this->roles[0];
        } else {
            return parent::getRoles();
        }
    }

    public function setRoles(array $roles) {
        if (isset($_SERVER['PATH_INFO'])) {
            $path_info = $_SERVER['PATH_INFO'];
        } else {
            $path_info = "";
        }
        $admin_prod = substr($_SERVER['REQUEST_URI'], 0, 7);
        $admin_dev = substr($_SERVER['REQUEST_URI'], 12, 7);

        if ($path_info == "/admin/" || $admin_prod == "/admin/" || $admin_dev == "/admin/") {
            $this->roles = $roles;
        } else {
            return parent::setRoles($roles);
        }
    }

    function getCountry() {
        return $this->country;
    }

    function getCity() {
        return $this->city;
    }

    function setCountry($country) {
        $this->country = $country;
    }

    function setCity($city) {
        $this->city = $city;
    }

    /**
     * Set archive
     *
     * @param boolean $archive
     *
     * @return User
     */
    public function setArchive($archive) {
        $this->archive = $archive;
        if ($this->archive == true) {
            $this->setEnabled(false);
        } else {
            $this->setEnabled(true);
        }

        return $this;
    }

    /**
     * Get archive
     *
     * @return bool
     */
    public function getArchive() {
        return $this->archive;
    }

    function getWisheds() {
        return $this->wisheds;
    }

    function setWisheds($wisheds) {
        $this->wisheds = $wisheds;
    }

    function getZipcode() {
        return $this->zipcode;
    }

    function getWebsite() {
        return $this->website;
    }

    function setZipcode($zipcode) {
        $this->zipcode = $zipcode;
    }

    function setWebsite($website) {
        $this->website = $website;
    }

    function getTypeAgency() {
        return $this->typeAgency;
    }

    function getServicesAgency() {
        return $this->servicesAgency;
    }

    function getAboutWtd() {
        return $this->aboutWtd;
    }

    function setTypeAgency($typeAgency) {
        $this->typeAgency = $typeAgency;
    }

    function setServicesAgency($servicesAgency) {
        $this->servicesAgency = $servicesAgency;
    }

    function setAboutWtd($aboutWtd) {
        $this->aboutWtd = $aboutWtd;
    }

    function getNotifSms() {
        return $this->notifSms;
    }

    function setNotifSms($notifSms) {
        $this->notifSms = $notifSms;
    }    
}

?>