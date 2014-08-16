<?php

namespace LMammino\EFoundation\Address\Model;

/**
 * Class ZoneMemberProvince
 *
 * @package LMammino\EFoundation\Address\Model
 */
class ZoneMemberProvince extends ZoneMember
{
    /**
     * @var ProvinceInterface $province
     */
    protected $province;

    /**
     * Get province
     *
     * @return ProvinceInterface
     */
    public function getProvince()
    {
        return $this->province;
    }

    /**
     * Set province
     *
     * @param ProvinceInterface $province
     *
     * @return $this
     */
    public function setProvince(ProvinceInterface $province)
    {
        $this->province = $province;

        return $this;
    }
}
