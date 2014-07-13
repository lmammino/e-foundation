<?php

namespace LMammino\Tests\EFoundation\Model;

/**
 * Class TimestampableTraitTest
 *
 * @package LMammino\Tests\EFoundation\Model
 */
class TimestampableTraitTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \LMammino\EFoundation\Model\TimestampableTrait $timestampable
     */
    private $timestampable;

    /**
     * {@inheritDoc}
     */
    protected function setup()
    {
        $this->timestampable = $this->getMockForTrait('\LMammino\EFoundation\Model\TimestampableTrait');
    }

    /**
     * @test
     */
    public function it_should_handle_created_at()
    {
        $date = new \DateTime();
        $this->timestampable->setCreatedAt($date);
        $this->assertEquals($date, $this->timestampable->getCreatedAt());
    }

    /**
     * @test
     */
    public function it_should_handle_updated_at()
    {
        $date = new \DateTime();
        $this->timestampable->setUpdatedAt($date);
        $this->assertEquals($date, $this->timestampable->getUpdatedAt());
    }

}
 