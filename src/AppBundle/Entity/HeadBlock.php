<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * HeadBlock
 *
 * @ORM\Table()
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 */
class HeadBlock
{
    public function __construct() {
        $this->setUpdated(new \DateTime());
    }

    /**
     * @ORM\PrePersist()
     * @ORM\PreUpdate()
     */
    public function updateUpdatedDatetime() {
        $this->setUpdated(new \DateTime());
    }

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
     * @ORM\Column(name="headTitle", type="string", length=100)
     */
    private $headTitle;

    /**
     * @var string
     *
     * @ORM\Column(name="headPhone", type="string", length=100)
     */
    private $headPhone;

    /**
     * @var string
     *
     * @ORM\Column(name="headEmail", type="string", length=100)
     */
    private $headEmail;

    /**
     * @var string
     *
     * @ORM\Column(name="headAddress", type="string", length=100)
     */
    private $headAddress;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updated", type="datetime")
     */
    private $updated;

    /** @ORM\PrePersist */
    function onPrePersist()
    {
        $this->updated = new \DateTime('now');
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
     * Set headTitle
     *
     * @param string $headTitle
     *
     * @return HeadBlock
     */
    public function setHeadTitle($headTitle)
    {
        $this->headTitle = $headTitle;

        return $this;
    }

    /**
     * Get headTitle
     *
     * @return string
     */
    public function getHeadTitle()
    {
        return $this->headTitle;
    }

    /**
     * Set headPhone
     *
     * @param string $headPhone
     *
     * @return HeadBlock
     */
    public function setHeadPhone($headPhone)
    {
        $this->headPhone = $headPhone;

        return $this;
    }

    /**
     * Get headPhone
     *
     * @return string
     */
    public function getHeadPhone()
    {
        return $this->headPhone;
    }

    /**
     * Set headEmail
     *
     * @param string $headEmail
     *
     * @return HeadBlock
     */
    public function setHeadEmail($headEmail)
    {
        $this->headEmail = $headEmail;

        return $this;
    }

    /**
     * Get headEmail
     *
     * @return string
     */
    public function getHeadEmail()
    {
        return $this->headEmail;
    }

    /**
     * Set headAddress
     *
     * @param string $headAddress
     *
     * @return HeadBlock
     */
    public function setHeadAddress($headAddress)
    {
        $this->headAddress = $headAddress;

        return $this;
    }

    /**
     * Get headAddress
     *
     * @return string
     */
    public function getHeadAddress()
    {
        return $this->headAddress;
    }

    /**
     * Set updated
     *
     * @param \DateTime $updated
     *
     * @return HeadBlock
     */
    public function setUpdated($updated)
    {
        $this->updated = $updated;

        return $this;
    }

    /**
     * Get updated
     *
     * @return \DateTime
     */
    public function getUpdated()
    {
        return $this->updated;
    }
}
