<?php

namespace LMammino\Tests\EFoundation\Model\Address;

use LMammino\EFoundation\Model\Address\ZoneMemberZone;

/**
 * Class ZoneMemberZoneTest
 *
 * @package LMammino\Tests\EFoundation\Model\Address
 */
class ZoneMemberZoneTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var ZoneMemberZone $zone
     */
    private $zone;

    /**
     * {@inheritDoc}
     */
    protected function setup()
    {
        $this->zone = new ZoneMemberZone();
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
    public function it_should_handle_a_zone()
    {
        $zone = $this->getMock('\LMammino\EFoundation\Model\Address\ZoneInterface');
        $this->zone->setZone($zone);
        $this->assertEquals($zone, $this->zone->getZone());
    }

}
 