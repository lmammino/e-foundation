<?php

namespace LMammino\EFoundation\Model\Address;

/**
 * Class ZoneMemberZone
 *
 * @package LMammino\EFoundation\Model\Address
 */
class ZoneMemberZone extends ZoneMember
{
    /**
     * @var ZoneInterface $zone
     */
    protected $zone;

    /**
     * Get zone
     *
     * @return ZoneInterface
     */
    public function getZone()
    {
        return $this->zone;
    }

    /**
     * Set zone
     *
     * @param ZoneInterface $zone
     *
     * @return ZoneMemberZone
     */
    public function setZone(ZoneInterface $zone)
    {
        $this->zone = $zone;

        return $this;
    }

} 