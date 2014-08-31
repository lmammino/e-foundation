<?php

namespace LMammino\EFoundation\Cart\Model;

use LMammino\EFoundation\Price\Model\AdjustableInterface;
use LMammino\EFoundation\Price\Model\Adjustment;

/**
 * Class CartAdjustment
 *
 * @package LMammino\EFoundation\Cart\Model
 */
class CartAdjustment extends Adjustment implements CartAdjustmentInterface
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
        return $this->setAdjustable($cart);
    }

    /**
     * {@inheritDoc}
     */
    public function setAdjustable(AdjustableInterface $adjustable = null)
    {
        $this->adjustable = $this->cart = $adjustable;

        return $this;
    }
}
