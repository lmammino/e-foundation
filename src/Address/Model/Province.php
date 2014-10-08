<?php

namespace LMammino\EFoundation\Address\Model;

use LMammino\EFoundation\Common\Model\IdentifiableTrait;

/**
 * Class Province
 *
 * @package LMammino\EFoundation\Address\Model
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
     * @var string $shortName
     */
    protected $shortName;

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
    public function getShortName()
    {
        return $this->shortName;
    }

    /**
     * {@inheritDoc}
     */
    public function setShortName($shortName)
    {
        $this->shortName = $shortName;

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
    public function setCountry(CountryInterface $country = null)
    {
        $this->country = $country;

        return $this;
    }
}
