<?php

namespace LMammino\EFoundation\Tests\Address\Model;

/**
 * Class ZoneMemberTest
 *
 * @package LMammino\EFoundation\Tests\Address\Model
 */
class ZoneMemberTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \LMammino\EFoundation\Address\Model\ZoneMember $zoneMember
     */
    private $zoneMember;

    /**
     * {@inheritDoc}
     */
    protected function setup()
    {
        $this->zoneMember = $this->getMockForAbstractClass('\LMammino\EFoundation\Address\Model\ZoneMember');
    }

    /**
     * @test
     */
    public function it_should_implement_zone_member_interface()
    {
        $this->assertInstanceOf('\LMammino\EFoundation\Address\Model\ZoneMemberInterface', $this->zoneMember);
    }

    /**
     * @test
     */
    public function it_should_handle_a_name()
    {
        $name = 'Europe';
        $this->zoneMember->setName($name);
        $this->assertEquals($name, $this->zoneMember->getName());
    }

    /**
     * @test
     */
    public function it_should_handle_a_parent_zone()
    {
        $parentZone = $this->getMock('\LMammino\EFoundation\Address\Model\ZoneInterface');
        $this->zoneMember->setParentZone($parentZone);
        $this->assertEquals($parentZone, $this->zoneMember->getParentZone());
    }

    /**
     * @test
     */
    public function it_should_remove_parent_zone()
    {
        $parentZone = $this->getMock('\LMammino\EFoundation\Address\Model\ZoneInterface');
        $this->zoneMember->setParentZone($parentZone);
        $this->assertEquals($parentZone, $this->zoneMember->getParentZone());
        $this->zoneMember->setParentZone(null);
        $this->assertNull($this->zoneMember->getParentZone());
    }

}
