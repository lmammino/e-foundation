<?php

namespace LMammino\EFoundation\Cart\Model;

use LMammino\EFoundation\Order\Model\Order;

/**
 * Class Cart
 *
 * @package LMammino\EFoundation\Cart\Model
 */
class Cart extends Order implements CartInterface
{
    /**
     * @var \DateTime $expiresAt
     */
    protected $expiresAt;

    /**
     * {@inheritDoc}
     */
    public function getExpiresAt()
    {
        return $this->expiresAt;
    }

    /**
     * {@inheritDoc}
     */
    public function setExpiresAt(\DateTime $expiresAt = null)
    {
        $this->expiresAt = $expiresAt;

        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function incrementExpiresAt(\DateInterval $interval = null)
    {
        if (null === $this->expiresAt) {
            $this->expiresAt = new \DateTime();
        }

        if (null === $interval) {
            $interval = new \DateInterval('PT3H');
        }

        $this->expiresAt->add($interval);

        return $this;
    }

    /**
     * Checks whether the cart is expired or not.
     *
     * @return Boolean
     */
    public function isExpired()
    {
        if (null === $this->expiresAt) {
            return false;
        }

        $now = new \DateTime();

        return $this->expiresAt < $now;
    }
}
