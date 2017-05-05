<?php

namespace Acme\ApiBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * Activity
 *
 * @ORM\Table(name="availability")
 * @ORM\Entity(repositoryClass="Acme\ApiBundle\Repository\UnAvailabilityRepository")
 */
class UnAvailability {

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
     * @ORM\Column(name="start", type="date", nullable=true)
      /**

     */
    private $start;

    /**
     * @var string
     *
     * @ORM\Column(name="end", type="date", nullable=true)
     */
    private $end;
    
    function getId() {
        return $this->id;
    }

    function getStart() {
        return $this->start;
    }

    function getEnd() {
        return $this->end;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setStart($start) {
        $this->start = $start;
    }

    function setEnd($end) {
        $this->end = $end;
    }
}
?>