<?php

namespace LMammino\EFoundation\Model;

/**
 * Interface SoftDeletableInterface
 *
 * @package LMammino\EFoundation\Model
 */
interface SoftDeletableInterface
{
    /**
     * Check if the current element is marked as deleted
     *
     * @return boolean
     */
    public function isDeleted();

    /**
     * Get deleted at
     *
     * @return \DateTime
     */
    public function getDeletedAt();

    /**
     * Set deleted at
     *
     * @param \DateTime|null $deletedAt
     *
     * @return $this
     */
    public function setDeletedAt(\DateTime $deletedAt = null);
} 