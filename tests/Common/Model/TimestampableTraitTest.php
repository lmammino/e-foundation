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
     * @var \LMammino\EFoundation\Common\Model\TimestampableTrait $timestampable
     */
    private $timestampable;

    /**
     * {@inheritDoc}
     */
    protected function setup()
    {
        $this->timestampable = $this->getMockForTrait('\LMammino\EFoundation\Common\Model\TimestampableTrait');
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

    /**
     * @test
     */
    public function it_should_reset_created_and_updated_at_before_persisting()
    {
        $now = new \DateTime();
        $this->timestampable->onPrePersist();
        $this->assertEquals($now->getTimestamp(), $this->timestampable->getCreatedAt()->getTimestamp(), '', 1);
        $this->assertEquals($now->getTimestamp(), $this->timestampable->getUpdatedAt()->getTimestamp(), '', 1);
    }

    /**
     * @test
     */
    public function it_should_reset_updated_at_before_updating()
    {
        $now = new \DateTime();
        $this->timestampable->onPreUpdate();
        $this->assertEquals($now->getTimestamp(), $this->timestampable->getUpdatedAt()->getTimestamp(), '', 1);
    }

}
