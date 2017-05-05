<?php

namespace Acme\ApiBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Cocur\Slugify\Slugify;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * Activity
 *
 * @ORM\Table(name="tags")
 * @ORM\Entity(repositoryClass="Acme\ApiBundle\Repository\TagsRepository")
 * @Vich\Uploadable
 */
class Tags {

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, nullable=true)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="nameSlug", type="string", length=255, nullable=true)
     */
    private $nameSlug;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255)
     * @var string
     */
    private $image;

    /**
     * @Vich\UploadableField(mapping="tags_images", fileNameProperty="image")
     * @var File
     */
    private $imageFile;

    /**
     * @var bool
     *
     * @ORM\Column(name="homePage", type="boolean", nullable=true)
     */
    private $homePage;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created", type="datetime")
     */
    private $created;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="modified", type="datetime")
     */
    private $modified;

    
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
    
    public function __construct() {
        $this->created = new \DateTime('now');
        $this->modified = new \DateTime('now');
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

    function getName() {
        return $this->name;
    }

    function getDescription() {
        return $this->description;
    }

    function setName($name) {
        $this->name = $name;
    }

    function setDescription($description) {
        $this->description = $description;
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
    
    function getHomePage() {
        return $this->homePage;
    }

    function setHomePage($homePage) {
        $this->homePage = $homePage;
    }

    public function __toString()
    {
        return $this->name;
    }
    

    /**
     * Set image
     *
     * @param string $image
     *
     * @return Category
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return string
     */
    public function getImage()
    {
        return $this->image;
    }


    public function setImageFile(File $image = null)
    {
        $this->imageFile = $image;

        if ($image) {
            $this->modified = new \DateTime('now');
        }
    }

    public function getImageFile()
    {
        return $this->imageFile;
    }
    

    /**
     * Set created
     *
     * @param \DateTime $created
     *
     * @return Category
     */
    public function setCreated($created)
    {
        $this->created = $created;

        return $this;
    }

    /**
     * Get created
     *
     * @return \DateTime
     */
    public function getCreated()
    {
        return $this->created;
    }


    /**
     * Set modified
     *
     * @param \DateTime $modified
     *
     * @return Category
     */
    public function setModified($modified)
    {
        $this->modified = $modified;

        return $this;
    }

    /**
     * Get modified
     *
     * @return \DateTime
     */
    public function getModified()
    {
        return $this->modified;
    }

    public function getNbrfromAct(){
        //echo "test";
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



}
?>