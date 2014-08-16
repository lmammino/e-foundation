<?php

namespace LMammino\EFoundation\Tests\Address\Model;

use LMammino\EFoundation\Address\Model\ZoneMemberCountry;

/**
 * Class ZoneMemberCountryTest
 *
 * @package LMammino\EFoundation\Tests\Address\Model
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
        $this->assertInstanceOf('\LMammino\EFoundation\Address\Model\ZoneMemberInterface', $this->zone);
    }

    /**
     * @test
     */
    public function it_should_handle_a_country()
    {
        $country = $this->getMock('\LMammino\EFoundation\Address\Model\CountryInterface');
        $this->zone->setCountry($country);
        $this->assertEquals($country, $this->zone->getCountry());
    }

}
