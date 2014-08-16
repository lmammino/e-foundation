<?php

namespace LMammino\EFoundation\Tests\Address\Model;

use LMammino\EFoundation\Address\Model\Address;

/**
 * Class AddressTest
 *
 * @package LMammino\EFoundation\Tests\Address\Model
 */
class AddressTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \LMammino\EFoundation\Address\Model\Address $address
     */
    private $address;

    /**
     * {@inheritDoc}
     */
    protected function setup()
    {
        $this->address = new Address();
    }

    /**
     * @test
     */
    public function it_should_implement_address_interface()
    {
        $this->assertInstanceOf('\LMammino\EFoundation\Address\Model\AddressInterface', $this->address);
    }

    /**
     * @test
     */
    public function it_should_handle_a_first_name()
    {
        $firstName = 'Tim';
        $this->address->setFirstName($firstName);
        $this->assertEquals($firstName, $this->address->getFirstName());
    }

    /**
     * @test
     */
    public function it_should_handle_a_last_name()
    {
        $lastName = 'Cook';
        $this->address->setLastName($lastName);
        $this->assertEquals($lastName, $this->address->getLastName());
    }

    /**
     * @test
     */
    public function it_should_handle_a_company_name()
    {
        $companyName = 'Apple inc.';
        $this->address->setCompanyName($companyName);
        $this->assertEquals($companyName, $this->address->getCompanyName());
    }

    /**
     * @test
     */
    public function it_should_handle_a_company_identifier()
    {
        $companyIdentifier = '12345678';
        $this->address->setCompanyIdentifier($companyIdentifier);
        $this->assertEquals($companyIdentifier, $this->address->getCompanyIdentifier());
    }

    /**
     * @test
     */
    public function it_should_handle_a_country()
    {
        $country = $this->getMock('\LMammino\EFoundation\Address\Model\CountryInterface');
        $this->address->setCountry($country);
        $this->assertEquals($country, $this->address->getCountry());
    }

    /**
     * @test
     */
    public function it_should_handle_a_province()
    {
        $province = $this->getMock('\LMammino\EFoundation\Address\Model\ProvinceInterface');
        $this->address->setProvince($province);
        $this->assertEquals($province, $this->address->getProvince());
    }

    /**
     * @test
     */
    public function it_should_handle_a_street()
    {
        $street = 'Infinite loop, 1';
        $this->address->setStreet($street);
        $this->assertEquals($street, $this->address->getStreet());
    }

    /**
     * @test
     */
    public function it_should_handle_a_city()
    {
        $city = 'Cupertino';
        $this->address->setCity($city);
        $this->assertEquals($city, $this->address->getCity());
    }

    /**
     * @test
     */
    public function it_should_handle_a_post_code()
    {
        $postCode = '95014';
        $this->address->setPostCode($postCode);
        $this->assertEquals($postCode, $this->address->getPostCode());
    }

    /**
     * @test
     */
    public function it_should_properly_format_address_as_string()
    {
        $expected = <<<ADDR
Tim Cook
Apple Inc
123456789
Infinite Loop, 1
95014 Cupertino (CA)
USA
ADDR;

        $province = $this->getMock('\LMammino\EFoundation\Address\Model\ProvinceInterface');
        $province->expects($this->once())
                 ->method('getISOName')
                 ->will($this->returnValue('CA'));

        $country = $this->getMock('\LMammino\EFoundation\Address\Model\CountryInterface');
        $country->expects($this->once())
                ->method('getName')
                ->will($this->returnValue('USA'));

        $this->address->setFirstName('Tim')
             ->setLastName('Cook')
             ->setCompanyName('Apple Inc')
             ->setCompanyIdentifier('123456789')
             ->setStreet('Infinite Loop, 1')
             ->setPostCode('95014')
             ->setCity('Cupertino')
             ->setProvince($province)
             ->setCountry($country);

        $this->assertEquals($expected, (string) $this->address);
    }

    /**
     * @test
     */
    public function it_should_properly_format_address_with_missing_pieces_as_string()
    {
        $expected = <<<ADDR
Tim Cook
123456789
Infinite Loop, 1
95014 Cupertino (CA)
ADDR;

        $province = $this->getMock('\LMammino\EFoundation\Address\Model\ProvinceInterface');
        $province->expects($this->once())
            ->method('getISOName')
            ->will($this->returnValue('CA'));

        $this->address->setFirstName('Tim')
            ->setLastName('Cook')
            ->setCompanyIdentifier('123456789')
            ->setStreet('Infinite Loop, 1')
            ->setPostCode('95014')
            ->setCity('Cupertino')
            ->setProvince($province);

        $this->assertEquals($expected, (string) $this->address);
    }
}
