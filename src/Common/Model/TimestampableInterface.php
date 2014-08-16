<?php

namespace LMammino\EFoundation\Common\Model;

/**
 * Interface TimestampableInterface
 *
 * @package LMammino\EFoundation\Common\Model
 */
interface TimestampableInterface
{
    /**
     * Get created at
     *
     * @return \DateTime
     */
    public function getCreatedAt();

    /**
     * Set created at
     *
     * @param \DateTime $createdAt
     *
     * @return $this
     */
    public function setCreatedAt(\DateTime $createdAt);

    /**
     * Get updated at
     *
     * @return \DateTime
     */
    public function getUpdatedAt();

    /**
     * Set updated at
     *
     * @param \DateTime $updatedAt
     *
     * @return $this
     */
    public function setUpdatedAt(\DateTime $updatedAt);
}
