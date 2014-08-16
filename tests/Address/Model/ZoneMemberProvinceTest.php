<?php

namespace LMammino\EFoundation\Tests\Address\Model;

use LMammino\EFoundation\Address\Model\ZoneMemberProvince;

/**
 * Class ZoneMemberProvinceTest
 *
 * @package LMammino\EFoundation\Tests\Address\Model
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
        $this->assertInstanceOf('\LMammino\EFoundation\Address\Model\ZoneMemberInterface', $this->zone);
    }

    /**
     * @test
     */
    public function it_should_handle_a_province()
    {
        $province = $this->getMock('\LMammino\EFoundation\Address\Model\ProvinceInterface');
        $this->zone->setProvince($province);
        $this->assertEquals($province, $this->zone->getProvince());
    }

}
