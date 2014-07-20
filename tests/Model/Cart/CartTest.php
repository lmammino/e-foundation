<?php

namespace LMammino\EFoundation\Tests\Model\Cart;

use LMammino\EFoundation\Model\Cart\Cart;

/**
 * Class CartTest
 *
 * @package LMammino\EFoundation\Tests\Model\Cart
 */
class CartTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \LMammino\EFoundation\Model\Cart\Cart $cart
     */
    private $cart;

    /**
     * {@inheritDoc}
     */
    protected function setup()
    {
        $this->cart = new Cart();
    }

    /**
     * @test
     */
    public function it_should_implement_cart_interface()
    {
        $this->assertInstanceOf('\LMammino\EFoundation\Model\Cart\CartInterface', $this->cart);
    }

    /**
     * @test
     */
    public function it_should_handle_expired_at()
    {
        $expiredAt = new \DateTime();
        $this->cart->setExpiresAt($expiredAt);
        $this->assertSame($expiredAt, $this->cart->getExpiresAt());
    }

    /**
     * @test
     */
    public function it_should_not_expire_by_default()
    {
        $this->assertNull($this->cart->getExpiresAt());
    }

    /**
     * @test
     */
    public function it_should_increment_expires_at()
    {
        $expectedExpirationDate = new \DateTime('+3 hours');
        $this->cart->incrementExpiresAt();

        $this->assertEquals($expectedExpirationDate->getTimestamp(), $this->cart->getExpiresAt()->getTimestamp(), "", 2);
    }

    /**
     * @test
     */
    public function it_should_increment_expires_at_by_a_given_interval()
    {
        $expectedExpirationDate = new \DateTime('+3 days');
        $interval = new \DateInterval('P3D');
        $this->cart->incrementExpiresAt($interval);

        $this->assertEquals($expectedExpirationDate->getTimestamp(), $this->cart->getExpiresAt()->getTimestamp(), "", 2);
    }

    /**
     * @test
     */
    public function it_should_increment_expires_at_from_a_previous_date()
    {
        $startExpiresAt = new \DateTime('+2 months');
        $interval = new \DateInterval('P3M');
        $expectedExpirationDate = new \DateTime('+5 months');

        $this->cart->setExpiresAt($startExpiresAt);
        $this->cart->incrementExpiresAt($interval);

        $this->assertEquals($expectedExpirationDate->getTimestamp(), $this->cart->getExpiresAt()->getTimestamp(), "", 2);
    }

    /**
     * @test
     */
    public function it_should_check_if_expired()
    {
        $expiresAt = new \DateTime('+2 months');
        $this->cart->setExpiresAt($expiresAt);

        $this->assertFalse($this->cart->isExpired());

        $expiresAt = new \DateTime('-1 second');
        $this->cart->setExpiresAt($expiresAt);

        $this->assertTrue($this->cart->isExpired());
    }

    /**
     * @test
     */
    public function it_should_not_be_expired_by_default()
    {
        $this->assertFalse($this->cart->isExpired());
    }

}
