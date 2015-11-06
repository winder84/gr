<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * WorkExample
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class WorkExample
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="clientName", type="string", length=255)
     */
    private $clientName;

    /**
     * @var string
     *
     * @ORM\Column(name="clientSeat", type="string", length=255)
     */
    private $clientSeat;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @var \Application\Sonata\MediaBundle\Entity\Media
     * @ORM\ManyToOne(targetEntity="Application\Sonata\MediaBundle\Entity\Media", cascade={"persist"}, fetch="LAZY")
     */
    protected $clientPhoto;

    /**
     * @Assert\NotBlank()
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\ProductHasMedia", mappedBy="workExample",cascade={"persist","remove"})
     */
    private $workMedias;
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->workMedias = new ArrayCollection();
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
     * Set clientName
     *
     * @param string $clientName
     *
     * @return WorkExample
     */
    public function setClientName($clientName)
    {
        $this->clientName = $clientName;

        return $this;
    }

    /**
     * Get clientName
     *
     * @return string
     */
    public function getClientName()
    {
        return $this->clientName;
    }

    /**
     * Set clientSeat
     *
     * @param string $clientSeat
     *
     * @return WorkExample
     */
    public function setClientSeat($clientSeat)
    {
        $this->clientSeat = $clientSeat;

        return $this;
    }

    /**
     * Get clientSeat
     *
     * @return string
     */
    public function getClientSeat()
    {
        return $this->clientSeat;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return WorkExample
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set clientPhoto
     *
     * @param \Application\Sonata\MediaBundle\Entity\Media $clientPhoto
     *
     * @return WorkExample
     */
    public function setClientPhoto(\Application\Sonata\MediaBundle\Entity\Media $clientPhoto = null)
    {
        $this->clientPhoto = $clientPhoto;

        return $this;
    }

    /**
     * Get clientPhoto
     *
     * @return \Application\Sonata\MediaBundle\Entity\Media
     */
    public function getClientPhoto()
    {
        return $this->clientPhoto;
    }

    /**
     * Add workMedia
     *
     * @param \AppBundle\Entity\ProductHasMedia $workMedia
     *
     * @return WorkExample
     */
    public function addWorkMedia(\AppBundle\Entity\ProductHasMedia $workMedia)
    {
        $this->workMedias[] = $workMedia;

        return $this;
    }

    /**
     * Remove workMedia
     *
     * @param \AppBundle\Entity\ProductHasMedia $workMedia
     */
    public function removeWorkMedia(\AppBundle\Entity\ProductHasMedia $workMedia)
    {
        $this->workMedias->removeElement($workMedia);
    }

    /**
     * Get workMedias
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getWorkMedias()
    {
        return $this->workMedias;
    }

    /**
     * Set productMedia
     *
     * @param array
     * @return WorkExample
     */
    public function setWorkMedias($media)
    {
        foreach ($media as $m) {
            $m->setWorkExample($this);
            $this->addWorkMedia($m);
        }
        return $this;
    }
}
