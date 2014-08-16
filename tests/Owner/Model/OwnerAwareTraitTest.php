<?php

namespace LMammino\EFoundation\Tests\Owner\Model;

/**
 * Class OwnerAwareTraitTest
 *
 * @package LMammino\EFoundation\Tests\Owner\Model
 */
class OwnerAwareTraitTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \LMammino\EFoundation\Owner\Model\OwnerAwareInterface $ownerAware
     */
    private $ownerAware;

    /**
     * {@inheritDoc}
     */
    protected function setup()
    {
        $this->ownerAware = $this->getMockForTrait('\LMammino\EFoundation\Owner\Model\OwnerAwareTrait');
    }

    /**
     * @test
     */
    public function it_should_handle_an_owner()
    {
        $owner = $this->getMock('\LMammino\EFoundation\Owner\Model\OwnerInterface');
        $this->ownerAware->setOwner($owner);
        $this->assertSame($owner, $this->ownerAware->getOwner());
    }
}
