<?php

namespace LMammino\EFoundation\Cart\Model;

/**
 * Interface CartItemAdjustmentInterface
 *
 * @package LMammino\EFoundation\Cart\Model
 */
interface CartItemAdjustmentInterface
{
    /**
     * Get cart item
     *
     * @return CartItemInterface
     */
    public function getCartItem();

    /**
     * Set cart item
     *
     * @param CartItemInterface $cartItem
     *
     * @return $this
     */
    public function setCartItem(CartItemInterface $cartItem = null);
}
