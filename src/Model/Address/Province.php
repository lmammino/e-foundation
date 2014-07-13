<?php


namespace LMammino\EFoundation\Model\Address;

/**
 * Class Province
 *
 * @package LMammino\EFoundation\Model\Address
 */
class Province implements ProvinceInterface
{

    protected $name;

    protected $isoName;

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