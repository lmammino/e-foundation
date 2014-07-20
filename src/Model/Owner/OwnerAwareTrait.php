<?php

namespace LMammino\EFoundation\Model\Owner;

/**
 * Trait OwnerAwareTrait
 *
 * @package LMammino\EFoundation\Model\Owner
 */
trait OwnerAwareTrait
{
    /**
     * @var OwnerInterface $owner
     */
    protected $owner;

    /**
     * Get owner
     *
     * @return OwnerInterface
     */
    public function getOwner()
    {
        return $this->owner;
    }

    /**
     * Set owner
     *
     * @param OwnerInterface|null $owner
     *
     * @return $this
     */
    public function setOwner(OwnerInterface $owner = null)
    {
        $this->owner = $owner;

        return $this;
    }
}
