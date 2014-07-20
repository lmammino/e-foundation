<?php

namespace LMammino\EFoundation\Model\Owner;

/**
 * Class OwnerAwareInterface
 *
 * @package LMammino\EFoundation\Model\Owner
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
