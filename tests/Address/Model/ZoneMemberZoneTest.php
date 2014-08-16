<?php

namespace LMammino\EFoundation\Tests\Address\Model;

use LMammino\EFoundation\Address\Model\ZoneMemberZone;

/**
 * Class ZoneMemberZoneTest
 *
 * @package LMammino\EFoundation\Tests\Address\Model
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
        $this->assertInstanceOf('\LMammino\EFoundation\Address\Model\ZoneMemberInterface', $this->zone);
    }

    /**
     * @test
     */
    public function it_should_handle_a_zone()
    {
        $zone = $this->getMock('\LMammino\EFoundation\Address\Model\ZoneInterface');
        $this->zone->setZone($zone);
        $this->assertEquals($zone, $this->zone->getZone());
    }

}
