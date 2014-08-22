<?php

namespace LMammino\EFoundation\Cart\Model;

/**
 * Interface CartItemInterface
 *
 * @package LMammino\EFoundation\Cart\Model
 */
interface CartItemInterface
{
    /**
     * Get cart
     *
     * @return CartInterface
     */
    public function getCart();

    /**
     * Set cart
     *
     * @param CartInterface $cart
     *
     * @return $this
     */
    public function setCart(CartInterface $cart = null);
}
