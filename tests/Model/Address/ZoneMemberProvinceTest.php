<?php

namespace LMammino\Tests\EFoundation\Model\Address;

use LMammino\EFoundation\Model\Address\ZoneMemberProvince;

/**
 * Class ZoneMemberProvinceTest
 *
 * @package LMammino\Tests\EFoundation\Model\Address
 */
class ZoneMemberProvinceTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var ZoneMemberProvince $zone
     */
    private $zone;

    /**
     * {@inheritDoc}
     */
    protected function setup()
    {
        $this->zone = new ZoneMemberProvince();
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
    public function it_should_handle_a_province()
    {
        $province = $this->getMock('\LMammino\EFoundation\Model\Address\ProvinceInterface');
        $this->zone->setProvince($province);
        $this->assertEquals($province, $this->zone->getProvince());
    }

}
