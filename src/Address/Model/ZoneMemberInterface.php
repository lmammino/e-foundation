<?php

namespace LMammino\EFoundation\Address\Model;

use LMammino\EFoundation\Common\Model\IdentifiableInterface;

/**
 * Interface ZoneMemberInterface
 *
 * @package LMammino\EFoundation\Address\Model
 */
interface ZoneMemberInterface extends IdentifiableInterface
{
    /**
     * Get name
     *
     * @return string
     */
    public function getName();

    /**
     * Set name
     *
     * @param string $name
     *
     * @return $this
     */
    public function setName($name);

    /**
     * Gets the parent zone
     *
     * @return ZoneInterface
     */
    public function getParentZone();

    /**
     * Set the parent zone
     *
     * @param ZoneInterface|null $parentZone
     *
     * @return $this
     */
    public function setParentZone(ZoneInterface $parentZone = null);
}
