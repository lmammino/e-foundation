<?php

namespace LMammino\EFoundation\Tests\Address\Model;

use Doctrine\Common\Collections\ArrayCollection;
use LMammino\EFoundation\Address\Model\Country;

/**
 * Class CountryTest
 *
 * @package LMammino\EFoundation\Tests\Address\Model
 */
class CountryTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \LMammino\EFoundation\Address\Model\CountryInterface $country
     */
    private $country;

    /**
     * {@inheritDoc}
     */
    protected function setup()
    {
        $this->country = new Country();
    }

    /**
     * @test
     */
    public function it_implements_country_interface()
    {
        $this->assertInstanceOf('\LMammino\EFoundation\Address\Model\CountryInterface', $this->country);
    }

    /**
     * @test
     */
    public function it_should_handle_a_name()
    {
        $name = 'Italy';
        $this->country->setName($name);
        $this->assertEquals($name, $this->country->getName());
    }

    /**
     * @test
     */
    public function it_should_handle_a_iso_name()
    {
        $isoName = 'IT';
        $this->country->setISOName($isoName);
        $this->assertEquals($isoName, $this->country->getISOName());
    }

    /**
     * @test
     */
    public function it_should_handle_provinces()
    {
        $province = $this->getMock('\LMammino\EFoundation\Address\Model\ProvinceInterface');
        $province->expects($this->once())
                 ->method('setCountry')
                 ->with($this->country);

        $provinces = new ArrayCollection(array($province));

        $this->country->setProvinces($provinces);

        $this->assertContains($province, $this->country->getProvinces());
    }

    /**
     * @test
     */
    public function it_should_add_a_province()
    {
        $province = $this->getMock('\LMammino\EFoundation\Address\Model\ProvinceInterface');
        $this->country->addProvince($province);
        $this->assertTrue($this->country->hasProvince($province));
    }

    /**
     * @test
     */
    public function it_should_remove_a_province()
    {
        $province = $this->getMock('\LMammino\EFoundation\Address\Model\ProvinceInterface');
        $this->country->addProvince($province);
        $this->assertTrue($this->country->hasProvince($province));
        $this->country->removeProvince($province);
        $this->assertFalse($this->country->hasProvince($province));
    }

}
