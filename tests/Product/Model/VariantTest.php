<?php

namespace LMammino\EFoundation\Tests\Product\Model;

use LMammino\EFoundation\Product\Model\Variant;

/**
 * Class VariantTest
 *
 * @package LMammino\EFoundation\Tests\Product\Model
 */
class VariantTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Variant $variant
     */
    private $variant;

    /**
     * {@inheritDoc}
     */
    protected function setup()
    {
        $this->variant = new Variant();
    }

    /**
     * @test
     */
    public function it_should_implement_variant_interface()
    {
        $this->assertInstanceOf('\LMammino\EFoundation\Product\Model\VariantInterface', $this->variant);
    }

    /**
     * @test
     */
    public function it_should_handle_a_product()
    {
        $product = $this->getMock('\LMammino\EFoundation\Product\Model\ProductInterface');

        $this->variant->setProduct($product);
        $this->assertSame($product, $this->variant->getProduct());
        $this->assertSame($this->variant->getProduct(), $this->variant->getObject());
    }

    /**
     * @test
     */
    public function it_should_handle_an_available_on()
    {
        $availableOn = $this->getMock('\DateTime');

        $this->variant->setAvailableOn($availableOn);
        $this->assertSame($availableOn, $this->variant->getAvailableOn());
    }
}
