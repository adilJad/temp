<?php

namespace Acme\ApiBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * Post
 *
 * @ORM\Table(name="home")
 * @ORM\Entity(repositoryClass="Acme\ApiBundle\Repository\HomeRepository")
 * @Vich\Uploadable
 */
class Home
{
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
     * @ORM\Column(name="baseline", type="string", length=255, nullable=true)
     */
    private $baseline;

    /**
     * @var string
     *
     * @ORM\Column(name="slogan", type="string", length=255, nullable=true)
     */
    private $slogan;

    /**
     * @var string
     *
     * @ORM\Column(name="title_seo", type="string", length=255, nullable=true)
     */
    private $titleSeo;

    /**
     * @var string
     *
     * @ORM\Column(name="desc_seo", type="string", length=255, nullable=true)
     */
    private $descSeo;

    /**
     * @var string
     *
     * @ORM\Column(name="keyword_seo", type="string", length=255, nullable=true)
     */
    private $keywordSeo;


    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @var string
     */
    private $image;

    /**
     * @Vich\UploadableField(mapping="home_images", fileNameProperty="image")
     * @var File
     */
    private $imageFile;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @var string
     */
    private $cover;

    /**
     * @Vich\UploadableField(mapping="cover_images", fileNameProperty="cover")
     * @var File
     */
    private $coverFile;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @var string
     */
    private $drawing;

    /**
     * @Vich\UploadableField(mapping="drawing_images", fileNameProperty="drawing")
     * @var File
     */
    private $drawingFile;

    
    /**
     * @var string
     *
     * @ORM\Column(name="desc_header", type="text", nullable=true)
     */
    private $descHeader;
    
    /**
     * @var bool
     *
     * @ORM\Column(name="published", type="boolean" , nullable=true)
     */
    private $published;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created", type="date")
     */
    private $created;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="modified", type="date")
     */
    private $modified;


    /**
     * Constructor
     */
    public function __construct()
    {
        $this->created = new \DateTime('now');
        $this->modified = new \DateTime('now');
        $this->published = 1;
    }


    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getBaseline()
    {
        return $this->baseline;
    }

    /**
     * @param string $baseline
     */
    public function setBaseline($baseline)
    {
        $this->baseline = $baseline;
    }

    /**
     * @return string
     */
    public function getSlogan()
    {
        return $this->slogan;
    }

    /**
     * @param string $slogan
     */
    public function setSlogan($slogan)
    {
        $this->slogan = $slogan;
    }

    /**
     * @return string
     */
    public function getTitleSeo()
    {
        return $this->titleSeo;
    }

    /**
     * @param string $titleSeo
     */
    public function setTitleSeo($titleSeo)
    {
        $this->titleSeo = $titleSeo;
    }

    /**
     * @return string
     */
    public function getDescSeo()
    {
        return $this->descSeo;
    }

    /**
     * @param string $descSeo
     */
    public function setDescSeo($descSeo)
    {
        $this->descSeo = $descSeo;
    }

    /**
     * @return string
     */
    public function getKeywordSeo()
    {
        return $this->keywordSeo;
    }

    /**
     * @param string $keywordSeo
     */
    public function setKeywordSeo($keywordSeo)
    {
        $this->keywordSeo = $keywordSeo;
    }


    /**
     * @return \DateTime
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * @param \DateTime $created
     */
    public function setCreated($created)
    {
        $this->created = $created;
    }

    /**
     * @return \DateTime
     */
    public function getModified()
    {
        return $this->modified;
    }

    /**
     * @param \DateTime $modified
     */
    public function setModified($modified)
    {
        $this->modified = $modified;
    }

    function getPublished() {
        return $this->published;
    }

    function setPublished($published) {
        $this->published = $published;
    }

    /**
     * @return string
     */
    public function getDescHeader()
    {
        return $this->descHeader;
    }

    /**
     * @param string $descHeader
     */
    public function setDescHeader($descHeader)
    {
        $this->descHeader = $descHeader;
    }

    /**
     * @return string
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param string $image
     */
    public function setImage($image)
    {
        $this->image = $image;
    }
    

    /**
     * @return string
     */
    public function getCover()
    {
        return $this->cover;
    }

    /**
     * @param string $cover
     */
    public function setCover($cover)
    {
        $this->cover = $cover;
    }

    /**
     * @return File
     */
    public function getImageFile()
    {
        return $this->imageFile;
    }

    public function setImageFile(File $image = null)
    {
        $this->imageFile = $image;

        if ($image) {
            $this->modified = new \DateTime('now');
        }
    }

    /**
     * @return File
     */
    public function getCoverFile()
    {
        return $this->coverFile;
    }

    public function setCoverFile(File $image = null)
    {
        $this->coverFile = $image;
        if ($image) {
            $this->modified = new \DateTime('now');
        }
    }

    /**
     * @return mixed
     */
    public function getDrawing()
    {
        return $this->drawing;
    }

    /**
     * @param mixed $drawing
     */
    public function setDrawing($drawing)
    {
        $this->drawing = $drawing;
    }

    /**
     * @return File
     */
    public function getDrawingFile()
    {
        return $this->drawingFile;
    }


    public function setDrawingFile(File $image = null)
    {
        $this->drawingFile = $image;
        if ($image) {
            $this->modified = new \DateTime('now');
        }
    }
}
?>