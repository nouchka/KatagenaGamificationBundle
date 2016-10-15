<?php

namespace Katagena\GamificationBundle\Entity;

/**
 * Badge
 */
class Badge
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $title;

    /**
     * @var integer
     */
    private $target;

    /**
     * @var \DateTime
     */
    private $created_at;

    /**
     * @var \DateTime
     */
    private $updated_at;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $badges;

    /**
     * @var \Katagena\GamificationBundle\Entity\Badge
     */
    private $parent;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->badges = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set title
     *
     * @param string $title
     *
     * @return Badge
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set target
     *
     * @param integer $target
     *
     * @return Badge
     */
    public function setTarget($target)
    {
        $this->target = $target;

        return $this;
    }

    /**
     * Get target
     *
     * @return integer
     */
    public function getTarget()
    {
        return $this->target;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return Badge
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
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     *
     * @return Badge
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updated_at = $updatedAt;

        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updated_at;
    }

    /**
     * Add badge
     *
     * @param \Katagena\GamificationBundle\Entity\Badge $badge
     *
     * @return Badge
     */
    public function addBadge(\Katagena\GamificationBundle\Entity\Badge $badge)
    {
        $this->badges[] = $badge;

        return $this;
    }

    /**
     * Remove badge
     *
     * @param \Katagena\GamificationBundle\Entity\Badge $badge
     */
    public function removeBadge(\Katagena\GamificationBundle\Entity\Badge $badge)
    {
        $this->badges->removeElement($badge);
    }

    /**
     * Get badges
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getBadges()
    {
        return $this->badges;
    }

    /**
     * Set parent
     *
     * @param \Katagena\GamificationBundle\Entity\Badge $parent
     *
     * @return Badge
     */
    public function setParent(\Katagena\GamificationBundle\Entity\Badge $parent = null)
    {
        $this->parent = $parent;

        return $this;
    }

    /**
     * Get parent
     *
     * @return \Katagena\GamificationBundle\Entity\Badge
     */
    public function getParent()
    {
        return $this->parent;
    }
}

