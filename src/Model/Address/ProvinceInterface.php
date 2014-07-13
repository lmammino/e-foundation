<?php

namespace LMammino\EFoundation\Model\Address;

/**
 * Interface ProvinceInterface
 *
 * @package LMammino\EFoundation\Model\Address
 */
interface ProvinceInterface
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
     * @return ProvinceInterface
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
     * @return ProvinceInterface
     */
    public function setISOName($isoName);

    /**
     * Get country
     *
     * @return CountryInterface
     */
    public function getCountry();

    /**
     * Set country
     *
     * @param CountryInterface $country
     *
     * @return ProvinceInterface
     */
    public function setCountry(CountryInterface $country);
} 