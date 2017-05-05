<?php

namespace Acme\ApiBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Cocur\Slugify\Slugify;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;


/**
 * Category
 *
 * @ORM\Table(name="category")
 * @ORM\Entity(repositoryClass="Acme\ApiBundle\Repository\CategoryRepository")
 * @Vich\Uploadable
 */
class Category {
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
     * @ORM\Column(name="title", type="string", length=255, unique=true)
     */
    private $name;

    /**
     * @var bool
     *
     * @ORM\Column(name="published", type="boolean")
     */
    private $published = true;
    
    /**
     * @var int
     *
     * @ORM\Column(name="classement", type="integer")
     */
    private $classement = 0;

      /**
     * @var string
     *
     * @ORM\Column(name="slug", type="string", length=255, nullable=true )
     */
    private $slug = null;

	
    /**
     * @ORM\Column(type="string", length=255)
     * @var string
     */
    private $image;

    /**
     * @Vich\UploadableField(mapping="category_images", fileNameProperty="image")
     * @var File
     */
    private $imageFile;

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

    public function __construct() {
        $this->published = true;
        $this->created = new \DateTime('now');
        $this->modified = new \DateTime('now');
    }
    
    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Category
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set published
     *
     * @param boolean $published
     *
     * @return Category
     */
    public function setPublished($published)
    {
        $this->published = $published;

        return $this;
    }

    /**
     * Get published
     *
     * @return boolean
     */
    public function getPublished()
    {
        return $this->published;
    }

    public function __toString()
    {
        return $this->name;
    }
    
    function getClassement() {
        return $this->classement;
    }

    function setClassement($classement) {
        $this->classement = $classement;
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


      /**
     * Get slug
     *
     * @return string
     */
    public function getSlug()
    {
        $slugify = new Slugify();
        $slug = $this->slug;
        $slugS = $slugify->slugify($this->slug);
        $slugT = $slugify->slugify($this->getName());

        if(empty($slug)) {
            $slug = $slugT;

        }else if($slugS!=$slugT){
            $slug = $slugS;

        }else if($slugS==$slugT){
            $slug = $slugT;
        }

        return $slug;
    }

    /**
     * Set slug
     *
     * @param string $slug
     *
     * @return Activity
     */
    public function setSlug($slug)
    {
        $slugify = new Slugify();

        $slugS = $slugify->slugify($slug);
        $slugT = $slugify->slugify($this->getName());

        if(empty($slug)) {
            $slug = $slugT;

        }else if($slugS!=$slugT){
            $slug = $slugS;

        }else if($slugS==$slugT){
            $slug = $slugT;
        }

        $this->slug = $slug;
        return $this;
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