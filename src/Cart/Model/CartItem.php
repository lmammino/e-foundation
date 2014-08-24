<?php

namespace LMammino\EFoundation\Cart\Model;

use LMammino\EFoundation\Order\Model\OrderInterface;
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
        return $this->cart;
    }

    /**
     * {@inheritDoc}
     */
    public function setCart(CartInterface $cart = null)
    {
        return $this->setOrder($cart);
    }

    /**
     * {@inheritDoc}
     */
    public function setOrder(OrderInterface $order = null)
    {
        $this->order = $this->cart = $order;

        return $this;
    }
}
