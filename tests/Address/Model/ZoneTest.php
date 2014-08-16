<?php

namespace LMammino\EFoundation\Tests\Address\Model;

use Doctrine\Common\Collections\ArrayCollection;
use LMammino\EFoundation\Address\Model\Zone;
use LMammino\EFoundation\Address\Model\ZoneInterface;

/**
 * Class ZoneTest
 *
 * @package LMammino\EFoundation\Tests\Address\Model
 */
class ZoneTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Zone $zone
     */
    private $zone;

    /**
     * {@inheritDoc}
     */
    protected function setup()
    {
        $this->zone = new Zone();
    }

    /**
     * @test
     */
    public function it_should_implement_zone_interface()
    {
        $this->assertInstanceOf('\LMammino\EFoundation\Address\Model\ZoneInterface', $this->zone);
    }

    /**
     * @test
     */
    public function it_should_handle_a_name()
    {
        $name = 'Europe';
        $this->zone->setName($name);
        $this->assertEquals($name, $this->zone->getName());
    }

    /**
     * @test
     */
    public function it_should_handle_a_type()
    {
        $type = ZoneInterface::TYPE_COUNTRY;
        $this->zone->setType($type);
        $this->assertEquals($type, $this->zone->getType());
    }

    /**
     * @test
     */
    public function it_should_handle_members()
    {
        $member = $this->getMock('\LMammino\EFoundation\Address\Model\ZoneMemberInterface');
        $member->expects($this->once())
               ->method('setParentZone')
               ->with($this->zone);
        $members = new ArrayCollection(array($member));
        $this->zone->setMembers($members);
        $this->assertContains($member, $this->zone->getMembers());
    }

    /**
     * @test
     */
    public function it_should_add_a_member()
    {
        $member = $this->getMock('\LMammino\EFoundation\Address\Model\ZoneMemberInterface');
        $this->zone->addMember($member);
        $this->assertContains($member, $this->zone->getMembers());
    }

    /**
     * @test
     */
    public function it_should_check_if_has_member()
    {
        $member = $this->getMock('\LMammino\EFoundation\Address\Model\ZoneMemberInterface');
        $this->assertFalse($this->zone->hasMember($member));
        $this->zone->addMember($member);
        $this->assertTrue($this->zone->hasMember($member));
    }

    /**
     * @test
     */
    public function it_should_remove_member()
    {
        $member = $this->getMock('\LMammino\EFoundation\Address\Model\ZoneMemberInterface');
        $this->zone->addMember($member);
        $this->assertTrue($this->zone->hasMember($member));
        $this->zone->removeMember($member);
        $this->assertFalse($this->zone->hasMember($member));
    }
}
