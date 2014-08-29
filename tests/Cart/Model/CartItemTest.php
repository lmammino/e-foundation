<?php

namespace LMammino\EFoundation\Tests\Cart\Model;

use LMammino\EFoundation\Cart\Model\CartItem;

/**
 * Class CartItemTest
 *
 * @package LMammino\EFoundation\Tests\Cart\Model
 */
class CartItemTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var CartItem $cartItem
     */
    private $cartItem;

    /**
     * {@inheritDoc}
     */
    protected function setup()
    {
        $this->cartItem = new CartItem();
    }

    /**
     * @test
     */
    public function it_should_implement_cart_item_interface()
    {
        $this->assertInstanceOf('\LMammino\EFoundation\Cart\Model\CartItemInterface', $this->cartItem);
    }

    /**
     * @test
     */
    public function it_should_handle_cart()
    {
        $cart = $this->getMock('\LMammino\EFoundation\Cart\Model\CartInterface');
        $this->cartItem->setCart($cart);
        $this->assertSame($cart, $this->cartItem->getCart());
    }
}
