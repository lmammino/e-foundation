<?php

namespace LMammino\EFoundation\Tests\Cart\Model;

/**
 * Class CartAwareTraitTest
 *
 * @package LMammino\EFoundation\Tests\Cart\Model
 */
class CartAwareTraitTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \LMammino\EFoundation\Cart\Model\CartAwareInterface $cartAware
     */
    private $cartAware;

    /**
     * {@inheritDoc}
     */
    protected function setup()
    {
        $this->cartAware = new DummyCartAware();
    }

    /**
     * @test
     */
    public function it_should_handle_a_cart()
    {
        $cart = $this->getMock('\LMammino\EFoundation\Cart\Model\CartInterface');
        $this->cartAware->setCart($cart);
        $this->assertSame($cart, $this->cartAware->getCart());
    }
}
