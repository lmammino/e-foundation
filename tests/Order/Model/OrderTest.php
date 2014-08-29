<?php

namespace LMammino\EFoundation\tests\Order\Model;

use Doctrine\Common\Collections\ArrayCollection;
use LMammino\EFoundation\Order\Model\Order;

/**
 * Class OrderTest
 *
 * @package LMammino\EFoundation\tests\Order\Model
 */
class OrderTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \LMammino\EFoundation\Order\Model\Order $order
     */
    private $order;

    /**
     * {@inheritDoc}
     */
    protected function setup()
    {
        $this->order = new Order();
    }

    /**
     * @test
     */
    public function it_should_implement_order_interface()
    {
        $this->assertInstanceOf('\LMammino\EFoundation\Order\Model\OrderInterface', $this->order);
    }

    /**
     * @test
     */
    public function it_should_handle_a_state()
    {
        $state = 'pending';
        $this->order->setState($state);
        $this->assertEquals($state, $this->order->getState());
    }

    /**
     * @test
     */
    public function it_should_handle_a_completed_at()
    {
        $completedAt = new \DateTime('17 May 1987');

        $this->order->setCompletedAt($completedAt);
        $this->assertSame($completedAt, $this->order->getCompletedAt());
    }

    /**
     * @test
     */
    public function it_should_be_completable()
    {
        $this->order->complete();
        $this->assertTrue($this->order->isCompleted());
    }

    /**
     * @test
     */
    public function it_should_complete_using_current_date_time()
    {
        $this->order->complete();
        $now = new \DateTime();
        $completedAt = $this->order->getCompletedAt();

        $this->assertEquals($now->getTimestamp(), $completedAt->getTimestamp(), '', 1);
    }

    /**
     * @test
     */
    public function it_should_not_be_complete_by_default()
    {
        $this->assertFalse($this->order->isCompleted());
    }
}
