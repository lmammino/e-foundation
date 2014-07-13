<?php

namespace LMammino\EFoundation\Model\Address;

/**
 * Interface ZoneMemberInterface
 *
 * @package LMammino\EFoundation\Model\Address
 */
interface ZoneMemberInterface
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