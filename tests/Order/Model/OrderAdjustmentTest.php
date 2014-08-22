<?php

namespace LMammino\EFoundation\Tests\Order\Model;

use LMammino\EFoundation\Order\Model\OrderAdjustment;

/**
 * Class OrderAdjustmentTest
 *
 * @package LMammino\EFoundation\Tests\Order\Model
 */
class OrderAdjustmentTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var OrderAdjustment $orderAdjustment
     */
    private $orderAdjustment;

    /**
     * {@inheritDoc}
     */
    protected function setup()
    {
        $this->orderAdjustment = new OrderAdjustment();
    }

    /**
     * @test
     */
    public function it_should_implement_order_adjustment_interface()
    {
        $this->assertInstanceOf('\LMammino\EFoundation\Order\Model\OrderAdjustmentInterface', $this->orderAdjustment);
    }

    /**
     * @test
     */
    public function it_should_handle_an_order()
    {
        $order = $this->getMock('\LMammino\EFoundation\Order\Model\OrderInterface');
        $this->orderAdjustment->setOrder($order);
        $this->assertSame($order, $this->orderAdjustment->getOrder());
        $this->assertSame($this->orderAdjustment->getOrder(), $this->orderAdjustment->getAdjustable());
    }
}
