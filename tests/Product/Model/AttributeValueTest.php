<?php

namespace LMammino\EFoundation\Tests\Product\Model;

use LMammino\EFoundation\Product\Model\AttributeValue;

/**
 * Class AttributeValueTest
 *
 * @package LMammino\EFoundation\Tests\Product\Model
 */
class AttributeValueTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var AttributeValue $attributeValue
     */
    private $attributeValue;

    /**
     * {@inheritDoc}
     */
    protected function setup()
    {
        $this->attributeValue = new AttributeValue();
    }

    /**
     * @test
     */
    public function it_should_implement_attribute_value_interface()
    {
        $this->assertInstanceOf('\LMammino\EFoundation\Product\Model\AttributeValueInterface', $this->attributeValue);
    }

    /**
     * @test
     */
    public function it_should_handle_a_product()
    {
        $product = $this->getMock('\LMammino\EFoundation\Product\Model\ProductInterface');

        $this->attributeValue->setProduct($product);
        $this->assertSame($product, $this->attributeValue->getProduct());
        $this->assertSame($this->attributeValue->getProduct(), $this->attributeValue->getSubject());
    }
}
