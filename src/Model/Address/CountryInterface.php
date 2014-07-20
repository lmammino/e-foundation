<?php

namespace LMammino\EFoundation\Model\Address;

use LMammino\EFoundation\Model\IdentifiableInterface;

use Doctrine\Common\Collections\Collection;

/**
 * Interface CountryInterface
 *
 * @package LMammino\EFoundation\Model\Address
 */
interface CountryInterface extends IdentifiableInterface
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
     * @return $this
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
     * @return $this
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
     * @return $this
     */
    public function setProvinces(Collection $provinces);

    /**
     * Add province
     *
     * @param ProvinceInterface $province
     *
     * @return $this
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
     * @return $this
     */
    public function removeProvince(ProvinceInterface $province);
}
