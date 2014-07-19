<?php

namespace LMammino\Tests\EFoundation\Model;

/**
 * Class SoftDeletableTraitTest
 *
 * @package LMammino\Tests\EFoundation\Model
 */
class SoftDeletableTraitTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var \LMammino\EFoundation\Model\SoftDeletableTrait $softDeletable
     */
    private $softDeletable;

    /**
     * {@inheritDoc}
     */
    protected function setup()
    {
        $this->softDeletable = $this->getMockForTrait('\LMammino\EFoundation\Model\SoftDeletableTrait');
    }

    /**
     * @test
     */
    public function it_should_handle_created_at()
    {
        $date = new \DateTime();
        $this->softDeletable->setDeletedAt($date);
        $this->assertEquals($date, $this->softDeletable->getDeletedAt());
    }

    /**
     * @test
     */
    public function it_should_not_be_deleted_if_lacks_of_deleted_at()
    {
        $this->assertNull($this->softDeletable->getDeletedAt());
        $this->assertFalse($this->softDeletable->isDeleted());
    }

    /**
     * @test
     */
    public function it_should_not_be_deleted_if_deleted_at_is_in_the_future()
    {
        $date = new \DateTime('+2 months');
        $this->softDeletable->setDeletedAt($date);
        $this->assertFalse($this->softDeletable->isDeleted());
        $this->assertNotNull($this->softDeletable->getDeletedAt());
    }

    /**
     * @test
     */
    public function it_should_be_considered_deleted_if_has_deleted_at_in_the_past()
    {
        $date = new \DateTime();
        $this->softDeletable->setDeletedAt($date);
        $this->assertTrue($this->softDeletable->isDeleted());
    }

    /**
     * @test
     */
    public function it_should_be_restorable()
    {
        $date = new \DateTime();
        $this->softDeletable->setDeletedAt($date);
        $this->assertTrue($this->softDeletable->isDeleted());
        $this->softDeletable->setDeletedAt(null);
        $this->assertFalse($this->softDeletable->isDeleted());
        $this->assertNull($this->softDeletable->getDeletedAt());
    }

}
