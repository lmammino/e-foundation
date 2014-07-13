<?php


namespace LMammino\Tests\EFoundation\Model\Address;

use LMammino\EFoundation\Model\Address\Country;

/**
 * Class CountryTest
 *
 * @package LMammino\Tests\EFoundation\Model\Address
 */
class CountryTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \LMammino\EFoundation\Model\Address\CountryInterface $country
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
        $this->assertInstanceOf('\LMammino\EFoundation\Model\Address\CountryInterface', $this->country);
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
        $provinces = $this->getMock('\Doctrine\Common\Collections\Collection');
        $this->country->setProvinces($provinces);
        $this->assertEquals($provinces, $this->country->getProvinces());
    }

    /**
     * @test
     */
    public function it_should_add_a_province()
    {
        $province = $this->getMock('\LMammino\EFoundation\Model\Address\ProvinceInterface');
        $this->country->addProvince($province);
        $this->assertTrue($this->country->hasProvince($province));
    }

    /**
     * @test
     */
    public function it_should_remove_a_province()
    {
        $province = $this->getMock('\LMammino\EFoundation\Model\Address\ProvinceInterface');
        $this->country->addProvince($province);
        $this->assertTrue($this->country->hasProvince($province));
        $this->country->removeProvince($province);
        $this->assertFalse($this->country->hasProvince($province));
    }

}
 