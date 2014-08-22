<?php

namespace LMammino\EFoundation\Cart\Model;

use LMammino\EFoundation\Order\Model\OrderItem;

/**
 * Class CartItem
 *
 * @package LMammino\EFoundation\Cart\Model
 */
class CartItem extends OrderItem implements CartItemInterface
{
    /**
     * @var CartInterface $cart
     */
    protected $cart;

    /**
     * {@inheritDoc}
     */
    public function getCart()
    {
        return $this->order;
    }

    /**
     * {@inheritDoc}
     */
    public function setCart(CartInterface $cart = null)
    {
         $this->order = $this->cart = $cart;

        return $this;
    }
}
