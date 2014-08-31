<?php

namespace LMammino\EFoundation\Tests\Cart\Model;

use LMammino\EFoundation\Cart\Model\CartAdjustment;

/**
 * Class CartAdjustmentTest
 *
 * @package LMammino\EFoundation\Tests\Cart\Model
 */
class CartAdjustmentTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var CartAdjustment $cartAdjustment
     */
    private $cartAdjustment;

    /**
     * {@inheritDoc}
     */
    protected function setup()
    {
        $this->cartAdjustment = new CartAdjustment();
    }

    /**
     * @test
     */
    public function it_should_implement_cart_adjustment_interface()
    {
        $this->assertInstanceOf('\LMammino\EFoundation\Cart\Model\CartAdjustmentInterface', $this->cartAdjustment);
    }

    /**
     * @test
     */
    public function it_should_handle_a_cart()
    {
        $cart = $this->getMock('\LMammino\EFoundation\Cart\Model\CartInterface');
        $this->cartAdjustment->setCart($cart);
        $this->assertSame($cart, $this->cartAdjustment->getCart());
        $this->assertSame($this->cartAdjustment->getAdjustable(), $this->cartAdjustment->getCart());
    }
}
