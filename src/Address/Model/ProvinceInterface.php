<?php

namespace LMammino\EFoundation\Address\Model;

use LMammino\EFoundation\Common\Model\IdentifiableInterface;

/**
 * Interface ProvinceInterface
 *
 * @package LMammino\EFoundation\Address\Model
 */
interface ProvinceInterface extends IdentifiableInterface
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
     * @return $this
     */
    public function setCountry(CountryInterface $country = null);
}
