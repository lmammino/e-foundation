<?php

namespace LMammino\EFoundation\Cart\Model;

use LMammino\EFoundation\Price\Model\AdjustableInterface;
use LMammino\EFoundation\Price\Model\Adjustment;

/**
 * Class CartItemAdjustment
 *
 * @package LMammino\EFoundation\Cart\Model
 */
class CartItemAdjustment extends Adjustment implements CartItemAdjustmentInterface
{
    /**
     * @var CartItemInterface $cartItem
     */
    protected $cartItem;

    /**
     * {@inheritDoc}
     */
    public function getCartItem()
    {
        return $this->cartItem;
    }

    /**
     * {@inheritDoc}
     */
    public function setCartItem(CartItemInterface $cartItem = null)
    {
        return $this->setAdjustable($cartItem);
    }

    /**
     * {@inheritDoc}
     */
    public function setAdjustable(AdjustableInterface $adjustable = null)
    {
        $this->adjustable = $this->cartItem = $adjustable;

        return $this;
    }
}
