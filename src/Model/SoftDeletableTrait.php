<?php

namespace LMammino\EFoundation\Model;

/**
 * Class SoftDeletableTrait
 *
 * @package LMammino\EFoundation\Model
 */
trait SoftDeletableTrait
{
    /**
     * @var \DateTime $deletedAt
     */
    protected $deletedAt;

    /**
     * Check if the current element is marked as deleted
     *
     * @return boolean
     */
    public function isDeleted()
    {
        return (null !== $this->deletedAt && $this->deletedAt <= new \DateTime());
    }

    /**
     * Get deleted at
     *
     * @return \DateTime
     */
    public function getDeletedAt()
    {
        return $this->deletedAt;
    }

    /**
     * Set deleted at
     *
     * @param \DateTime|null $deletedAt
     *
     * @return $this
     */
    public function setDeletedAt(\DateTime $deletedAt = null)
    {
        $this->deletedAt = $deletedAt;

        return $this;
    }

} 