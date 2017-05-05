<?php

namespace Acme\ApiBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Cocur\Slugify\Slugify;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * Activity
 *
 * @ORM\Table(name="activity")
 * @ORM\Entity(repositoryClass="Acme\ApiBundle\Repository\ActivityRepository")
 * @Vich\Uploadable
 */
class Activity {

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * * @ORM\ManyToOne(targetEntity="Acme\ApiBundle\Entity\Category")
     */
    private $category;

    /**
     * @ORM\ManyToOne(targetEntity="Acme\ApiBundle\Entity\User")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id" )
     */
    private $user;

    /**
     * @ORM\OneToMany(targetEntity="Acme\ApiBundle\Entity\Media", mappedBy="activity")
     */
    private $medias;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @var string
     */
    private $image;

    /**
     * @Vich\UploadableField(mapping="activity_images", fileNameProperty="image", nullable=true)
     * @var File
     */
    private $imageFile;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, nullable=true)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="included", type="array",  nullable=true)
     */
    private $included;

    /**
     * @var string
     *
     * @ORM\Column(name="notIncluded", type="array", nullable=true)
     */
    private $notIncluded;

    /**
     * @var string
     *
     * @ORM\Column(name="highlights", type="array",nullable=true)
     */
    private $highlights;

    /**
     * @var string
     *
     * @ORM\Column(name="knowBefore", type="text", nullable=true)
     */
    private $knowBefore;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", nullable=true)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="duration", type="string", length=255, nullable=true)
     */
    private $duration = null;

    /**
     * @var bool
     *
     * @ORM\Column(name="enabled", type="boolean", nullable=true)
     */
    private $enabled;

    /**
     * @var bool
     *
     * @ORM\Column(name="published", type="boolean" , nullable=true)
     */
    private $published;

    /**
     * @var bool
     *
     * @ORM\Column(name="popular", type="boolean" , nullable=true)
     */
    private $popular;

    /**
     * @var bool
     *
     * @ORM\Column(name="event", type="boolean" , nullable=true)
     */
    private $event;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created", type="datetime", nullable=true)
     */
    private $created;

    /**
     * @var string
     *
     * @ORM\Column(name="startAt", type="array", nullable=true)
     */
    private $startAt;

    /**
     * @var string
     *
     * @ORM\Column(name="guideLangs", type="array", nullable=true)
     */
    private $guideLangs;

    /**
     * @var integer
     *
     * @ORM\Column(name="maxPersons", type="integer", nullable=true)
     */
    private $maxPersons;

    /**
     * @var integer
     *
     * @ORM\Column(name="ppersAdult", type="integer", nullable=true)
     */
    private $ppersAdult;

    /**
     * @var integer
     *
     * @ORM\Column(name="ppersChild", type="integer", nullable=true)
     */
    private $ppersChild;

    /**
     * @ORM\ManyToMany(targetEntity="Acme\ApiBundle\Entity\Pricinggroup", cascade={"persist"})
     * @ORM\JoinColumn(nullable=true)
     */
    private $pricinggroups;

    /**
     * @var string
     *
     * @ORM\Column(name="annulation", type="string", length=100, nullable=true)
     */
    private $annulation;

    /**
     * @var string
     *
     * @ORM\Column(name="pricingType", type="string", length=55, nullable=true)
     */
    private $pricingType;

    /**
     * @var string
     *
     * @ORM\Column(name="nameSlug", type="string", length=255, nullable=true)
     */
    private $nameSlug;


    /**
     * @var string
     *
     * @ORM\Column(name="promotionStart", type="date", nullable=true)
      /**

     */
    private $promotionStart;

    /**
     * @var string
     *
     * @ORM\Column(name="promotionEnd", type="date", nullable=true)
     */
    private $promotionEnd;

    /**
     * @var string
     *
     * @ORM\Column(name="eventStart", type="date", nullable=true)
      /**

     */
    private $eventStart;

    /**
     * @var string
     *
     * @ORM\Column(name="eventEnd", type="date", nullable=true)
     */
    private $eventEnd;

    /**
     * @var string
     *
     * @ORM\Column(name="promotionDiscounte", type="string", length=255, nullable=true)
     */
    private $promotionDiscounte = null;

    /**
     * @ORM\ManyToMany(targetEntity="Acme\ApiBundle\Entity\Tags")
     */
    private $tags;
    

    /**
     * @var string
     *
     * @ORM\Column(name="stationStart", type="string", length=255, nullable=true)
     */
    private $stationStart;


    /**
     * @var string
     *
     * @ORM\Column(name="stationEnd", type="string", length=255, nullable=true)
     */
    private $stationEnd;

    
    /**
     * @var string
     *
     * @ORM\Column(name="typeMeet", type="string", length=255, nullable=true)
     */
    private $typeMeet;

    /**
     * @var string
     *
     * @ORM\Column(name="addressMP", type="string", length=255, nullable=true)
     */
    private $addressMP;

    /**
     * @var string
     *
     * @ORM\Column(name="longMP", type="string", length=255, nullable=true)
     */
    private $longMP;

    /**
     * @var string
     *
     * @ORM\Column(name="latMP", type="string", length=255, nullable=true)
     */
    private $latMP;

    /**
     * @var string
     *
     * @ORM\Column(name="helpfull", type="string", length=255, nullable=true)
     */
    private $helpfull;

    /**
     * @var bool
     *
     * @ORM\Column(name="itinerary", type="boolean" , nullable=true)
     */
    private $itinerary;

    /**
     * @var string
     *
     * @ORM\Column(name="waypoints", type="array", length=255, nullable=true)
     */
    private $waypoints;

    /**
     * @var integer
     *
     * @ORM\Column(name="view", type="integer", nullable=true)
     */
    private $view;
    
    /**
     * @var bool
     *
     * @ORM\Column(name="archive", type="boolean" , nullable=true)
     */
    private $archive;

    /**
     * @var integer
     *
     * @ORM\Column(name="strength", type="string", length=255, nullable=true)
     */
    private $strength;

    /**
     * @ORM\Column(type="float",  nullable=true)
     * @var float
     */
    private $votes = 0;

    /**
     * @ORM\Column(type="integer",  nullable=true)
     * @var f
     */
    private $nbVotes;

    /**
     * @var string
     *
     * @ORM\Column(name="nameFr", type="string", length=255, nullable=true)
     */
    private $nameFr;

    /**
     * @var string
     *
     * @ORM\Column(name="nameEs", type="string", length=255, nullable=true)
     */
    private $nameEs;

    /**
     * @var string
     *
     * @ORM\Column(name="nameSlugFr", type="string", length=255, nullable=true)
     */
    private $nameSlugFr;

    /**
     * @var string
     *
     * @ORM\Column(name="nameSlugEs", type="string", length=255, nullable=true)
     */
    private $nameSlugEs;

    /**
     * @var string
     *
     * @ORM\Column(name="ref", type="string", length=255, nullable=true)
     */
    private $ref;

    /**
     * @var string
     *
     * @ORM\Column(name="timeBefBook", type="string", length=255, nullable=true)
     */
    private $timeBefBook;

    /**
     * @ORM\ManyToMany(targetEntity="Acme\ApiBundle\Entity\UnAvailability")
     */
    private $unAvailabilities;


    /**
     * @var string
     *
     * @ORM\Column(name="unAvailability", type="text",nullable=true)
     */
    private $unAvailability;

    public function __construct() {
        $this->tags = new \Doctrine\Common\Collections\ArrayCollection();
        $this->medias = new \Doctrine\Common\Collections\ArrayCollection();
        $this->enabled = true;
        $this->created = new \DateTime('now');
        $this->modified = new \DateTime('now');
        /* $this->promotionStart = new \DateTime('now'); */
//        $this->promotionEnd = new \DateTime('now');
        $this->published = 0;
        $this->strength = 1;
        $this->archive = false;
    }

    /**
     * Get id
     *
     * @return int
     */
    public function getId() {
        return $this->id;
    }

    function setId($id) {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getUser() {
        return $this->user;
    }

    /**
     * @param mixed $user
     * @return Activity
     */
    public function setUser($user) {
        $this->user = $user;
        return $this;
    }

    /**
     * @return string
     */
    public function getName() {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Activity
     */
    public function setName($name) {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getDescription() {
        return $this->description;
    }

    /**
     * @param string $description
     * @return Activity
     */
    public function setDescription($description) {
        $this->description = $description;
        return $this;
    }

    /**
     * @return string
     */
    public function getDuration() {
        return $this->duration;
    }

    /**
     * @param string $duration
     * @return Activity
     */
    public function setDuration($duration) {
        $this->duration = $duration;
        return $this;
    }

    /**
     * @var string
     *
     * @ORM\Column(name="typeDuration", type="string", length=255, nullable=true)
     */
    private $typeDuration = null;

    /**
     * @return boolean
     */
    public function isEnabled() {
        return $this->enabled;
    }

    /**
     * @param boolean $enabled
     * @return Activity
     */
    public function setEnabled($enabled) {
        $this->enabled = $enabled;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isPublished() {
        return $this->published;
    }

    /**
     * @param boolean $published
     * @return Activity
     */
    public function setPublished($published) {
        $this->published = $published;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getCreated() {
        return $this->created;
    }

    /**
     * @param \DateTime $created
     * @return Activity
     */
    public function setCreated($created) {
        $this->created = $created;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getModified() {
        return $this->modified;
    }

    function getMaxPersons() {
        return $this->maxPersons;
    }

    /**
     * @param \DateTime $modified
     * @return Activity
     */
    public function setModified($modified) {
        $this->modified = $modified;
        return $this;
    }

    function getStartAt() {
        return $this->startAt;
    }

    function setStartAt($startAt) {
        $this->startAt = $startAt;
    }

    function setMaxPersons($maxPersons) {
        $this->maxPersons = $maxPersons;
    }

    /**
     * Get enabled
     *
     * @return boolean
     */
    public function getEnabled() {
        return $this->enabled;
    }

    /**
     * Get published
     *
     * @return boolean
     */
    public function getPublished() {
        return $this->published;
    }

    function getPpersAdult() {
        return $this->ppersAdult;
    }

    function getPpersChild() {
        return $this->ppersChild;
    }

    function setPpersAdult($ppersAdult) {
        $this->ppersAdult = $ppersAdult;
    }

    function setPpersChild($ppersChild) {
        $this->ppersChild = $ppersChild;
    }

    /**
     * Add pricinggroup
     *
     * @param \Acme\ApiBundle\Entity\Pricinggroup $pricinggroup
     *
     * @return Activity
     */
    public function addPricinggroup(\Acme\ApiBundle\Entity\Pricinggroup $pricinggroup) {
        $this->pricinggroups[] = $pricinggroup;

        return $this;
    }

    /**
     * Remove pricinggroup
     *
     * @param \Acme\ApiBundle\Entity\Pricinggroup $pricinggroup
     */
    public function removePricinggroup(\Acme\ApiBundle\Entity\Pricinggroup $pricinggroup) {
        $this->pricinggroups->removeElement($pricinggroup);
    }

    /**
     * Get pricinggroups
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPricinggroups() {
        return $this->pricinggroups;
    }

    function getAnnulation() {
        return $this->annulation;
    }

    function setAnnulation($annulation) {
        $this->annulation = $annulation;
    }

    function getPricingType() {
        return $this->pricingType;
    }

    function setPricingType($pricingType) {
        $this->pricingType = $pricingType;
    }


    /**
     * Get nameSlug
     *
     * @return string
     */
    public function getNameSlug() {
        $slugify = new Slugify();
        $slug = $this->nameSlug;
        $slugS = $slugify->slugify($this->nameSlug);
        $slugT = $slugify->slugify($this->getName());

        if (empty($slug)) {
            $slug = $slugT;
        } else if ($slugS != $slugT) {
            $slug = $slugS;
        } else if ($slugS == $slugT) {
            $slug = $slugT;
        }

        return $slug;
    }

    /**
     * Set nameSlug
     *
     * @param string $nameSlug
     * 
     * @return Activity
     */
    public function setNameSlug($slug) {
        $slugify = new Slugify();

        $slugS = $slugify->slugify($slug);
        $slugT = $slugify->slugify($this->getName());

        if (empty($slug)) {
            $slug = $slugT;
        } else if ($slugS != $slugT) {
            $slug = $slugS;
        } else if ($slugS == $slugT) {
            $slug = $slugT;
        }

        $this->nameSlug = $slug;
        return $this;
    }

    /**
     * Get nameSlug
     *
     * @return string
     */
    public function getNameSlugEs() {
        $slugify = new Slugify();
        $slug = $this->nameSlugEs;
        $slugS = $slugify->slugify($this->nameSlugEs);
        $slugT = $slugify->slugify($this->getNameEs());

        if (empty($slug)) {
            $slug = $slugT;
        } else if ($slugS != $slugT) {
            $slug = $slugS;
        } else if ($slugS == $slugT) {
            $slug = $slugT;
        }

        return $slug;
    }

    /**
     * Set nameSlug
     *
     * @param string $nameSlug
     * 
     * @return Activity
     */
    public function setNameSlugEs($slug) {
        $slugify = new Slugify();

        $slugS = $slugify->slugify($slug);
        $slugT = $slugify->slugify($this->getNameEs());

        if (empty($slug)) {
            $slug = $slugT;
        } else if ($slugS != $slugT) {
            $slug = $slugS;
        } else if ($slugS == $slugT) {
            $slug = $slugT;
        }

        $this->nameSlugEs = $slug;
        return $this;
    }

    /**
     * Get nameSlug
     *
     * @return string
     */
    public function getNameSlugFr() {
        $slugify = new Slugify();
        $slug = $this->nameSlugFr;
        $slugS = $slugify->slugify($this->nameSlugFr);
        $slugT = $slugify->slugify($this->getNameFr());

        if (empty($slug)) {
            $slug = $slugT;
        } else if ($slugS != $slugT) {
            $slug = $slugS;
        } else if ($slugS == $slugT) {
            $slug = $slugT;
        }

        return $slug;
    }

    /**
     * Set nameSlug
     *
     * @param string $nameSlug
     * 
     * @return Activity
     */
    public function setNameSlugFr($slug) {
        $slugify = new Slugify();
        $slugS = $slugify->slugify($slug);
        $slugT = $slugify->slugify($this->getNameFr());

        if (empty($slug)) {
            $slug = $slugT;
        } else if ($slugS != $slugT) {
            $slug = $slugS;
        } else if ($slugS == $slugT) {
            $slug = $slugT;
        }

        $this->nameSlugEn = $slug;
        return $this;
    }

    function getNameFr() {
        return $this->nameFr;
    }

    function getNameEs() {
        return $this->nameEs;
    }

    function setNameFr($nameFr) {
        $this->nameFr = $nameFr;
    }

    function setNameEs($nameEs) {
        $this->nameEs = $nameEs;
    }

    function getIncluded() {
        return $this->included;
    }

    function getNotIncluded() {
        return $this->notIncluded;
    }

    function getHighlights() {
        return $this->highlights;
    }

    function getKnowBefore() {
        return $this->knowBefore;
    }

    function setIncluded($included) {
        $this->included = $included;
    }

    function setNotIncluded($notIncluded) {
        $this->notIncluded = $notIncluded;
    }

    function setHighlights($highlights) {
        $this->highlights = $highlights;
    }

    function setKnowBefore($knowBefore) {
        $this->knowBefore = $knowBefore;
    }

    /**
     * Add media
     *
     * @param \Acme\ApiBundle\Entity\Media $media
     *
     * @return Activity
     */
    public function addMedia(\Acme\ApiBundle\Entity\Media $media) {
        $this->medias[] = $media;

        return $this;
    }

    /**
     * Remove media
     *
     * @param \Acme\ApiBundle\Entity\Media $media
     */
    public function removeMedia(\Acme\ApiBundle\Entity\Media $media) {
        $this->medias->removeElement($media);
    }

    /**
     * Get medias
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getMedias() {
        return $this->medias;
    }

    public function getPromotionStart() {
        return $this->promotionStart;
    }

    public function setPromotionStart($promotionStart) {
        $this->promotionStart = $promotionStart;
    }

    public function getPromotionEnd() {
        return $this->promotionEnd;
    }

    public function setPromotionEnd($promotionEnd) {
        $this->promotionEnd = $promotionEnd;
    }

    /**
     * @return string
     */
    public function getPromotionDiscounte() {
        return $this->promotionDiscounte;
    }

    /**
     * @param string $promotionDiscounte
     */
    public function setPromotionDiscounte($promotionDiscounte) {
        $this->promotionDiscounte = $promotionDiscounte;
    }

    /**
     * Set image
     *
     * @param string $image
     *
     * @return Category
     */
    public function setImage($image) {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return string
     */
    public function getImage() {
        return $this->image;
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

    public function __toString() {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getTypeDuration() {
        return $this->typeDuration;
    }

    /**
     * @param string $typeDuration
     */
    public function setTypeDuration($typeDuration) {
        $this->typeDuration = $typeDuration;
    }

    /**
     * Add tag
     *
     * @param \Acme\ApiBundle\Entity\Tags $tag
     *
     * @return Activity
     */
    public function addTag(\Acme\ApiBundle\Entity\Tags $tag) {
        $this->tags[] = $tag;

        return $this;
    }

    /**
     * Remove tag
     *
     * @param \Acme\ApiBundle\Entity\Tags $tag
     */
    public function removeTag(\Acme\ApiBundle\Entity\Tags $tag) {
        $this->tags->removeElement($tag);
    }

    /**
     * Get tags
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTags() {
        return $this->tags;
    }

    function getStationStart() {
        return $this->stationStart;
    }

    function getWaypoints() {
        return $this->waypoints;
    }

    function getStationEnd() {
        return $this->stationEnd;
    }

    function getArchive() {
        return $this->archive;
    }

    function setStationStart($stationStart) {
        $this->stationStart = $stationStart;
    }

    function setWaypoints($waypoints) {
        $this->waypoints = $waypoints;
    }

    function setStationEnd($stationEnd) {
        $this->stationEnd = $stationEnd;
    }

    /**
     * Set archive
     *
     * @param boolean $archive
     *
     * @return Activity
     */
    public function setArchive($archive) {
        $this->archive = $archive;
        if ($this->archive == true) {
            $this->setEnabled(false);
            $this->setPublished(false);
        } else {
            $this->setEnabled(true);
            $this->setPublished(true);
        }

        return $this;
    }

//
//    function getMeeting() {
//        return $this->meeting;
//    }
//
//    function setMeeting($meeting) {
//        $this->meeting = $meeting;
//    }

    function getStrength() {
        return $this->strength;
    }

    function setStrength($strength) {
        $this->strength = $strength;
    }

    function getPopular() {
        return $this->popular;
    }

    function setPopular($popular) {
        $this->popular = $popular;
        if ($this->popular == true) {
            $this->setEnabled(false);
            $this->setPublished(false);
        }
    }

    function getVotes() {
        return $this->votes;
    }

    function getNbVotes() {
        return $this->nbVotes;
    }

    function setVotes($votes) {
        $this->votes = $votes;
    }

    function setNbVotes($nbVotes) {
        $this->nbVotes = $nbVotes;
    }

    function getRef() {
        return $this->ref;
    }

    function setRef($ref) {
        $this->ref = $ref;
    }

    function getTimeBefBook() {
        return $this->timeBefBook;
    }

    function setTimeBefBook($timeBefBook) {
        $this->timeBefBook = $timeBefBook;
    }

    function getGuideLangs() {
        return $this->guideLangs;
    }

    function setGuideLangs($guideLangs) {
        $this->guideLangs = $guideLangs;
    }

    /**
     * @return int
     */
    public function getView() {
        return $this->view;
    }

    /**
     * @param int $view
     */
    public function setView($view) {
        $this->view = $view;
    }

    function getCategory() {
        return $this->category;
    }

    function setCategory($category) {
        $this->category = $category;
    }

    function getEventStart() {
        return $this->eventStart;
    }

    function getEventEnd() {
        return $this->eventEnd;
    }

    function setEventStart($eventStart) {
        $this->eventStart = $eventStart;
    }

    function setEventEnd($eventEnd) {
        $this->eventEnd = $eventEnd;
    }

    function getEvent() {
        return $this->event;
    }

    function setEvent($event) {
        $this->event = $event;
    }


    

    /**
     * Add unAvailability
     *
     * @param \Acme\ApiBundle\Entity\UnAvailability $unAvailability
     *
     * @return Activity
     */
    public function addUnAvailability(\Acme\ApiBundle\Entity\UnAvailability $unAvailability)
    {
        $this->unAvailabilities[] = $unAvailability;

        return $this;
    }

    /**
     * Remove unAvailability
     *
     * @param \Acme\ApiBundle\Entity\UnAvailability $unAvailability
     */
    public function removeUnAvailability(\Acme\ApiBundle\Entity\UnAvailability $unAvailability)
    {
        $this->unAvailabilities->removeElement($unAvailability);
    }

    /**
     * Get unAvailabilities
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getUnAvailabilities()
    {
        return $this->unAvailabilities;
    }
    
    function getTypeMeet() {
        return $this->typeMeet;
    }

    function getAddressMP() {
        return $this->addressMP;
    }

    function getLongMP() {
        return $this->longMP;
    }

    function getLatMP() {
        return $this->latMP;
    }

    function getHelpfull() {
        return $this->helpfull;
    }

    function getItinerary() {
        return $this->itinerary;
    }

    function getUnAvailability() {
        return $this->unAvailability;
    }

    function setTypeMeet($typeMeet) {
        $this->typeMeet = $typeMeet;
    }

    function setAddressMP($addressMP) {
        $this->addressMP = $addressMP;
    }

    function setLongMP($longMP) {
        $this->longMP = $longMP;
    }

    function setLatMP($latMP) {
        $this->latMP = $latMP;
    }

    function setHelpfull($helpfull) {
        $this->helpfull = $helpfull;
    }

    function setItinerary($itinerary) {
        $this->itinerary = $itinerary;
    }

    function setUnAvailability($unAvailability) {
        $this->unAvailability = $unAvailability;
    }


}
?>