<?php

namespace LMammino\EFoundation\Address\Model;

/**
 * Class ZoneMemberZone
 *
 * @package LMammino\EFoundation\Address\Model
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
     * @return $this
     */
    public function setZone(ZoneInterface $zone)
    {
        $this->zone = $zone;

        return $this;
    }
}
