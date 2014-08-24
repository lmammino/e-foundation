<?php

namespace LMammino\EFoundation\Tests\Product\Model;

use LMammino\EFoundation\Product\Model\Attribute;

/**
 * Class AttributeTest
 *
 * @package LMammino\EFoundation\Tests\Product\Model
 */
class AttributeTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Attribute $attribute
     */
    private $attribute;

    /**
     * {@inheritDoc}
     */
    protected function setup()
    {
        $this->attribute = new Attribute();
    }

    /**
     * @test
     */
    public function it_should_implement_attribute_interface()
    {
        $this->assertInstanceOf('\LMammino\EFoundation\Product\Model\AttributeInterface', $this->attribute);
    }
}
