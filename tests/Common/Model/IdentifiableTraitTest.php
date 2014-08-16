<?php

namespace LMammino\EFoundation\tests\Common\Model;

/**
 * Class IdentifiableTraitTest
 *
 * @package LMammino\EFoundation\tests\Common\Model
 */
class IdentifiableTraitTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \LMammino\EFoundation\Common\Model\IdentifiableTrait $identifiable
     */
    private $identifiable;

    /**
     * {@inheritDoc}
     */
    protected function setup()
    {
        $this->identifiable = $this->getMockForTrait('\LMammino\EFoundation\Common\Model\IdentifiableTrait');
    }

    /**
     * @test
     */
    public function it_should_handle_an_id()
    {
        $id = '1234';
        $this->identifiable->setId($id);
        $this->assertEquals($id, $this->identifiable->getId());
    }

}
