<?php

namespace LMammino\EFoundation\Tests\Address\Model;

use LMammino\EFoundation\Address\Model\Province;

/**
 * Class ProvinceTest
 *
 * @package LMammino\EFoundation\Tests\Address\Model
 */
class ProvinceTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \LMammino\EFoundation\Address\Model\Province $province
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
        $this->assertInstanceOf('\LMammino\EFoundation\Address\Model\ProvinceInterface', $this->province);
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
    public function it_should_handle_a_short_name()
    {
        $shortName = 'RM';
        $this->province->setShortName($shortName);
        $this->assertEquals($shortName, $this->province->getShortName());
    }

    /**
     * @test
     */
    public function it_should_handle_a_country()
    {
        $country = $this->getMock('\LMammino\EFoundation\Address\Model\CountryInterface');
        $this->province->setCountry($country);
        $this->assertEquals($country, $this->province->getCountry());
    }

}
