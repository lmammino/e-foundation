<?php

namespace LMammino\EFoundation\Cart\Model;

/**
 * Interface CartAwareInterface
 *
 * @package LMammino\EFoundation\Cart\Model
 */
interface CartAwareInterface
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
