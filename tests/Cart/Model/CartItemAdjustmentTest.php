<?php

namespace LMammino\EFoundation\Tests\Cart\Model;

use LMammino\EFoundation\Cart\Model\CartItemAdjustment;

/**
 * Class CartItemAdjustmentTest
 *
 * @package LMammino\EFoundation\Tests\Cart\Model
 */
class CartItemAdjustmentTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var CartItemAdjustment $cartItemAdjustment
     */
    private $cartItemAdjustment;

    /**
     * {@inheritDoc}
     */
    protected function setup()
    {
        $this->cartItemAdjustment = new CartItemAdjustment();
    }

    /**
     * @test
     */
    public function it_should_implement_cart_item_adjustment_interface()
    {
        $this->assertInstanceOf(
            '\LMammino\EFoundation\Cart\Model\CartItemAdjustmentInterface',
            $this->cartItemAdjustment
        );
    }

    /**
     * @test
     */
    public function it_should_handle_a_cart_item()
    {
        $cartItem = $this->getMock('\LMammino\EFoundation\Cart\Model\CartItemInterface');
        $this->cartItemAdjustment->setCartItem($cartItem);
        $this->assertSame($cartItem, $this->cartItemAdjustment->getCartItem());
        $this->assertSame($this->cartItemAdjustment->getAdjustable(), $this->cartItemAdjustment->getCartItem());
    }
}
