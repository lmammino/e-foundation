<?php

namespace LMammino\EFoundation\Model\Address;

use Doctrine\Common\Collections\Collection;

/**
 * Interface CountryInterface
 *
 * @package LMammino\EFoundation\Model\Address
 */
interface CountryInterface
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
     * @return CountryInterface
     */
    public function setName($name);

    /**
     * Get ISO name
     *
     * @return string
     */
    public function getISOName();

    /**
     * Set ISO name
     *
     * @param string $isoName
     *
     * @return CountryInterface
     */
    public function setISOName($isoName);

    /**
     * Get provinces
     *
     * @return Collection|ProvinceInterface[]
     */
    public function getProvinces();

    /**
     * Set provinces
     *
     * @param Collection $provinces
     *
     * @return CountryInterface
     */
    public function setProvinces(Collection $provinces);

    /**
     * Add province
     *
     * @param ProvinceInterface $province
     *
     * @return CountryInterface
     */
    public function addProvince(ProvinceInterface $province);

    /**
     * Check if has a given province
     *
     * @param ProvinceInterface $province
     *
     * @return boolean
     */
    public function hasProvince(ProvinceInterface $province);

    /**
     * Remove province
     *
     * @param ProvinceInterface $province
     *
     * @return CountryInterface
     */
    public function removeProvince(ProvinceInterface $province);

} 