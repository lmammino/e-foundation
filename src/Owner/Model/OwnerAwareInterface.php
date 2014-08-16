<?php

namespace LMammino\EFoundation\Owner\Model;

/**
 * Class OwnerAwareInterface
 *
 * @package LMammino\EFoundation\Owner\Model
 */
interface OwnerAwareInterface
{
    /**
     * Get owner
     *
     * @return OwnerInterface
     */
    public function getOwner();

    /**
     * Set owner
     *
     * @param OwnerInterface|null $owner
     *
     * @return $this
     */
    public function setOwner(OwnerInterface $owner = null);
}
