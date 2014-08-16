<?php

namespace LMammino\EFoundation\Address\Model;

use LMammino\EFoundation\Common\Model\IdentifiableTrait;
use LMammino\EFoundation\Common\Model\TimestampableTrait;

/**
 * Class Address
 *
 * @package LMammino\EFoundation\Address\Model
 */
class Address implements AddressInterface
{
    use TimestampableTrait {
        TimestampableTrait::__construct as private __timestampableConstruct;
    }
    use IdentifiableTrait;

    /**
     * @var string $firstName
     */
    protected $firstName;

    /**
     * @var string $lastName
     */
    protected $lastName;

    /**
     * @var string $companyName
     */
    protected $companyName;

    /**
     * @var string $companyIdentifier
     */
    protected $companyIdentifier;

    /**
     * @var CountryInterface $country
     */
    protected $country;

    /**
     * @var ProvinceInterface $province
     */
    protected $province;

    /**
     * @var string $street
     */
    protected $street;

    /**
     * @var string $city
     */
    protected $city;

    /**
     * @var string $postCode
     */
    protected $postCode;

    /**
     * Construct
     */
    public function __construct()
    {
        $this->__timestampableConstruct();
    }

    /**
     * {@inheritDoc}
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * {@inheritDoc}
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * {@inheritDoc}
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getCompanyName()
    {
        return $this->companyName;
    }

    /**
     * {@inheritDoc}
     */
    public function setCompanyName($companyName)
    {
        $this->companyName = $companyName;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getCompanyIdentifier()
    {
        return $this->companyIdentifier;
    }

    /**
     * {@inheritDoc}
     */
    public function setCompanyIdentifier($companyIdentifier)
    {
        $this->companyIdentifier = $companyIdentifier;

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

    /**
     * {@inheritDoc}
     */
    public function getProvince()
    {
        return $this->province;
    }

    /**
     * {@inheritDoc}
     */
    public function setProvince(ProvinceInterface $province)
    {
        $this->province = $province;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getStreet()
    {
        return $this->street;
    }

    /**
     * {@inheritDoc}
     */
    public function setStreet($street)
    {
        $this->street = $street;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * {@inheritDoc}
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getPostCode()
    {
        return $this->postCode;
    }

    /**
     * {@inheritDoc}
     */
    public function setPostCode($postCode)
    {
        $this->postCode = $postCode;

        return $this;
    }

    /**
     * Returns a string representation of the address
     *
     * @return string
     */
    public function __toString()
    {
        $data = array();
        $data[] = implode(' ', array($this->firstName, $this->lastName));
        $data[] = $this->companyName;
        $data[] = $this->companyIdentifier;
        $data[] = $this->street;

        $region = $this->city;
        if ($this->province) {
            $region .= sprintf(' (%s)', $this->province->getISOName());
        }

        $data[] = implode(' ', array($this->postCode, $region));
        if ($this->country) {
            $data[] = $this->country->getName();
        }

        for ($i = 0; $i < sizeof($data); $i++) {
            if (empty($data[$i])) {
                unset($data[$i]);
            }
        }

        return implode("\n", $data);
    }
}
