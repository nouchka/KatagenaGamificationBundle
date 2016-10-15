<?php

namespace Katagena\GamificationBundle\Entity;

/**
 * Event
 */
class Event
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var integer
     */
    private $done;

    /**
     * @var \DateTime
     */
    private $created_at;

    /**
     * @var \Katagena\GamificationBundle\Entity\Badge
     */
    private $badge;


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
     * Set done
     *
     * @param integer $done
     *
     * @return Event
     */
    public function setDone($done)
    {
        $this->done = $done;

        return $this;
    }

    /**
     * Get done
     *
     * @return integer
     */
    public function getDone()
    {
        return $this->done;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return Event
     */
    public function setCreatedAt($createdAt)
    {
        $this->created_at = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * Set badge
     *
     * @param \Katagena\GamificationBundle\Entity\Badge $badge
     *
     * @return Event
     */
    public function setBadge(\Katagena\GamificationBundle\Entity\Badge $badge = null)
    {
        $this->badge = $badge;

        return $this;
    }

    /**
     * Get badge
     *
     * @return \Katagena\GamificationBundle\Entity\Badge
     */
    public function getBadge()
    {
        return $this->badge;
    }
}

