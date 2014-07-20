<?php

namespace LMammino\EFoundation\Tests\Model\Owner;

/**
 * Class OwnerAwareTraitTest
 *
 * @package LMammino\EFoundation\Tests\Model\Owner
 */
class OwnerAwareTraitTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \LMammino\EFoundation\Model\Owner\OwnerAwareInterface $ownerAware
     */
    private $ownerAware;

    /**
     * {@inheritDoc}
     */
    protected function setup()
    {
        $this->ownerAware = $this->getMockForTrait('\LMammino\EFoundation\Model\Owner\OwnerAwareTrait');
    }

    /**
     * @test
     */
    public function it_should_handle_an_owner()
    {
        $owner = $this->getMock('\LMammino\EFoundation\Model\Owner\OwnerInterface');
        $this->ownerAware->setOwner($owner);
        $this->assertSame($owner, $this->ownerAware->getOwner());
    }
}
