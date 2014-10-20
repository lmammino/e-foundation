<?php

namespace LMammino\EFoundation\Owner\Model;

/**
 * Trait OwnerAwareTrait
 *
 * @package LMammino\EFoundation\Owner\Model
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

    /**
     * Checks if has an owner
     *
     * @return bool
     */
    public function hasOwner()
    {
        return null !== $this->owner;
    }
}
