<?php

namespace LMammino\EFoundation\Model\Address;

/**
 * Class ZoneMemberCountry
 *
 * @package LMammino\EFoundation\Model\Address
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