<?php

namespace LMammino\Tests\EFoundation\Model\Address;

use LMammino\EFoundation\Model\Address\Province;

/**
 * Class ProvinceTest
 *
 * @package LMammino\Tests\EFoundation\Model\Address
 */
class ProvinceTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \LMammino\EFoundation\Model\Address\Province $province
     */
    private $province;

    /**
     * {@inheritDoc}
     */
    protected function setup()
    {
        $this->province = new Province();
    }

    /**
     * @test
     */
    public function it_implements_province_interface()
    {
        $this->assertInstanceOf('\LMammino\EFoundation\Model\Address\ProvinceInterface', $this->province);
    }

    /**
     * @test
     */
    public function it_should_handle_a_name()
    {
        $name = 'Sicily';
        $this->province->setName($name);
        $this->assertEquals($name, $this->province->getName());
    }

    /**
     * @test
     */
    public function it_should_handle_a_iso_name()
    {
        $isoName = 'AU';
        $this->province->setISOName($isoName);
        $this->assertEquals($isoName, $this->province->getISOName());
    }

    /**
     * @test
     */
    public function it_should_handle_a_country()
    {
        $country = $this->getMock('\LMammino\EFoundation\Model\Address\CountryInterface');
        $this->province->setCountry($country);
        $this->assertEquals($country, $this->province->getCountry());
    }

}
