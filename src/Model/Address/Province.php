<?php

namespace LMammino\EFoundation\Model\Address;

use LMammino\EFoundation\Model\IdentifiableTrait;

/**
 * Class Province
 *
 * @package LMammino\EFoundation\Model\Address
 */
class Province implements ProvinceInterface
{
    use IdentifiableTrait;

    /**
     * @var string $name
     */
    protected $name;

    /**
     * @var string $isoName
     */
    protected $isoName;

    /**
     * @var CountryInterface $country
     */
    protected $country;

    /**
     * {@inheritDoc}
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * {@inheritDoc}
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getISOName()
    {
        return $this->isoName;
    }

    /**
     * {@inheritDoc}
     */
    public function setISOName($isoName)
    {
        $this->isoName = $isoName;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * {@inheritDoc}
     */
    public function setCountry(CountryInterface $country)
    {
        $this->country = $country;

        return $this;
    }
}
