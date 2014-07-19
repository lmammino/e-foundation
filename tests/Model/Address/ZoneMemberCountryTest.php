<?php

namespace LMammino\Tests\EFoundation\Model\Address;
use LMammino\EFoundation\Model\Address\ZoneMemberCountry;

/**
 * Class ZoneMemberCountryTest
 *
 * @package LMammino\Tests\EFoundation\Model\Address
 */
class ZoneMemberCountryTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var ZoneMemberCountry $zone
     */
    private $zone;

    /**
     * {@inheritDoc}
     */
    protected function setup()
    {
        $this->zone = new ZoneMemberCountry();
    }

    /**
     * @test
     */
    public function it_should_implement_zone_member_interface()
    {
        $this->assertInstanceOf('\LMammino\EFoundation\Model\Address\ZoneMemberInterface', $this->zone);
    }

    /**
     * @test
     */
    public function it_should_handle_a_country()
    {
        $country = $this->getMock('\LMammino\EFoundation\Model\Address\CountryInterface');
        $this->zone->setCountry($country);
        $this->assertEquals($country, $this->zone->getCountry());
    }

}
