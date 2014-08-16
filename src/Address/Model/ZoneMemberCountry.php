<?php

namespace LMammino\EFoundation\Address\Model;

/**
 * Class ZoneMemberCountry
 *
 * @package LMammino\EFoundation\Address\Model
 */
class ZoneMemberCountry extends ZoneMember
{
    /**
     * @var CountryInterface $country
     */
    protected $country;

    /**
     * Get country
     *
     * @return CountryInterface
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Set country
     *
     * @param CountryInterface $country
     *
     * @return $this
     */
    public function setCountry(CountryInterface $country)
    {
        $this->country = $country;

        return $this;
    }
}
