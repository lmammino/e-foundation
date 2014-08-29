<?php

namespace LMammino\EFoundation\Cart\Model;

/**
 * Trait CartAwareTrait
 *
 * @package LMammino\EFoundation\Cart\Model
 */
trait CartAwareTrait
{
    /**
     * @var CartInterface $cart
     */
    protected $cart;

    /**
     * Get cart
     *
     * @return CartInterface
     */
    public function getCart()
    {
        return $this->cart;
    }

    /**
     * Set cart
     *
     * @param CartInterface $cart
     *
     * @return $this
     */
    public function setCart(CartInterface $cart = null)
    {
        $this->cart = $cart;

        return $this;
    }
}
