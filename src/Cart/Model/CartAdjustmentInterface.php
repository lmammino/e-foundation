<?php

namespace LMammino\EFoundation\Cart\Model;

use LMammino\EFoundation\Price\Model\AdjustmentInterface;

/**
 * Interface CartAdjustmentInterface
 *
 * @package LMammino\EFoundation\Cart\Model
 */
interface CartAdjustmentInterface extends AdjustmentInterface
{
    /**
     * Get the cart
     *
     * @return CartInterface
     */
    public function getCart();

    /**
     * Set the cart
     *
     * @param CartInterface $cart
     *
     * @return $this
     */
    public function setCart(CartInterface $cart = null);
}
