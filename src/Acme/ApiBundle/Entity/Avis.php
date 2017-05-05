<?php
namespace Acme\ApiBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="Acme\ApiBundle\Repository\AvisRepository")
 */
class Avis 
{
      /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="thread", type="string", length=255, nullable=true)
     */
    protected $thread;
    
    /**
     * @ORM\ManyToOne(targetEntity="Acme\ApiBundle\Entity\User")
     */
    protected $author;

    /**
     * @var string
     *
     * @ORM\Column(name="comment", type="text" , nullable=true)
     */
    private $comment;

    /**
     * @var bool
     *
     * @ORM\Column(name="published", type="boolean")
     */
    private $published = false;
    
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created", type="date", nullable=true)
     */
    private $created;

    public function __construct() {
        $this->created = new \DateTime('now');
    }
    
    /**
     * @var integer
     *
     * @ORM\Column(name="vote", type="integer")
     */
    private $vote;

    function getId() {
        return $this->id;
    }

    function getThread() {
        return $this->thread;
    }

    function getAuthor() {
        return $this->author;
    }

    function getComment() {
        return $this->comment;
    }

    function getPublished() {
        return $this->published;
    }

    function getVote() {
        return $this->vote;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setThread($thread) {
        $this->thread = $thread;
    }

    function setAuthor($author) {
        $this->author = $author;
        return $this;
    }

    function setComment($comment) {
        $this->comment = $comment;
    }

    function setPublished($published) {
        $this->published = $published;
    }

    function setVote($vote) {
        $this->vote = $vote;
    }

    function getCreated() {
        return $this->created;
    }

    function setCreated(\DateTime $created) {
        $this->created = $created;
    }

}
?>