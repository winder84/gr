<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Application\Sonata\MediaBundle\Entity\Gallery;
use Symfony\Component\Validator\Constraints as Assert;
/**
 * @ORM\Table()
 * @ORM\Entity
 */
class ProductHasMedia {

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @Assert\NotBlank()
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\WorkExample", inversedBy="workMedias", cascade={"persist","remove"}, fetch="LAZY")
     * @ORM\JoinColumn(name="product", referencedColumnName="id")
     */
    protected $workExample;

    /**
     * @var \Application\Sonata\MediaBundle\Entity\Media
     * @Assert\NotBlank()
     * @ORM\ManyToOne(targetEntity="Application\Sonata\MediaBundle\Entity\Media", cascade={"persist"}, fetch="LAZY")
     * @ORM\JoinColumn(name="media", referencedColumnName="id")
     */
    protected $media;

    public function __construct()
    {
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set gallery
     *
     * @param \Application\Sonata\MediaBundle\Entity\Gallery $gallery
     * @return ProductHasMedia
     */
    public function setGallery(Gallery $gallery = null)
    {
        $this->gallery = $gallery;

        return $this;
    }

    /**
     * Get gallery
     *
     * @return \Application\Sonata\MediaBundle\Entity\Gallery 
     */
    public function getGallery()
    {
        return $this->gallery;
    }

    /**
     * Set media
     *
     * @param \Application\Sonata\MediaBundle\Entity\Media $media
     * @return ProductHasMedia
     */
    public function setMedia(\Application\Sonata\MediaBundle\Entity\Media $media = null)
    {
        $this->media = $media;

        return $this;
    }

    /**
     * Get media
     *
     * @return \Application\Sonata\MediaBundle\Entity\Media 
     */
    public function getMedia()
    {
        return $this->media;
    }

    /**
     * Set workExample
     *
     * @param \AppBundle\Entity\WorkExample $workExample
     *
     * @return ProductHasMedia
     */
    public function setWorkExample(\AppBundle\Entity\WorkExample $workExample = null)
    {
        $this->workExample = $workExample;

        return $this;
    }

    /**
     * Get workExample
     *
     * @return \AppBundle\Entity\WorkExample
     */
    public function getWorkExample()
    {
        return $this->workExample;
    }
}
