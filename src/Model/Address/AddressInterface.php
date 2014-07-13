<?php

namespace LMammino\EFoundation\Model\Address;

use LMammino\EFoundation\Model\TimestampableInterface;

/**
 * Interface AddressInterface
 *
 * @package LMammino\EFoundation\Model\Address
 */
interface AddressInterface extends TimestampableInterface
{
    /**
     * Get first name
     *
     * @return string
     */
    public function getFirstName();

    /**
     * Set first name
     *
     * @param string $firstName
     *
     * @return $this
     */
    public function setFirstName($firstName);

    /**
     * Get last name
     *
     * @return string
     */
    public function getLastName();

    /**
     * Set last name
     *
     * @param string $lastName
     *
     * @return $this
     */
    public function setLastName($lastName);

    /**
     * Get company name
     *
     * @return string
     */
    public function getCompanyName();

    /**
     * Set company name
     *
     * @param string $companyName
     *
     * @return $this
     */
    public function setCompanyName($companyName);

    /**
     * Get company identifier (eg. vat or registry number)
     *
     * @return string
     */
    public function getCompanyIdentifier();

    /**
     * Set company identifier
     *
     * @param string $companyIdentifier
     *
     * @return $this
     */
    public function setCompanyIdentifier($companyIdentifier);

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
    public function setCountry(CountryInterface $country);

    /**
     * Get province
     *
     * @return ProvinceInterface
     */
    public function getProvince();

    /**
     * Set province
     *
     * @param ProvinceInterface $province
     *
     * @return $this
     */
    public function setProvince(ProvinceInterface $province);

    /**
     * Get street
     *
     * @return string
     */
    public function getStreet();

    /**
     * Set street
     *
     * @param string $street
     *
     * @return $this
     */
    public function setStreet($street);

    /**
     * Get string
     *
     * @return string
     */
    public function getCity();

    /**
     * Set city
     *
     * @param string $city
     *
     * @return $this
     */
    public function setCity($city);

    /**
     * Get post code
     *
     * @return string
     */
    public function getPostCode();

    /**
     * Set post code
     *
     * @param string $postCode
     *
     * @return $this
     */
    public function setPostCode($postCode);
} 