<?php

namespace LMammino\EFoundation\Model\Address;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

/**
 * Class Country
 *
 * @package LMammino\EFoundation\Model\Address
 */
class Country implements CountryInterface
{
    /**
     * @var string $name
     */
    protected $name;

    /**
     * @var string $isoName
     */
    protected $isoName;

    /**
     * @var \Doctrine\Common\Collections\Collection $provinces
     */
    protected $provinces;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->provinces = new ArrayCollection();
    }

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
    public function getProvinces()
    {
        return $this->provinces;
    }

    /**
     * {@inheritDoc}
     */
    public function setProvinces(Collection $provinces)
    {
        $this->provinces = $provinces;
    }

    /**
     * {@inheritDoc}
     */
    public function addProvince(ProvinceInterface $province)
    {
        $this->provinces->add($province);

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function hasProvince(ProvinceInterface $province)
    {
        return $this->provinces->contains($province);
    }

    /**
     * {@inheritDoc}
     */
    public function removeProvince(ProvinceInterface $province)
    {
        $this->provinces->removeElement($province);

        return $this;
    }
}