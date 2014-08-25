<?php

namespace LMammino\EFoundation\Tests\Order\Model;

use LMammino\EFoundation\Order\Model\OrderItemAdjustment;

/**
 * Class OrderItemAdjustmentTest
 *
 * @package LMammino\EFoundation\Tests\Order\Model
 */
class OrderItemAdjustmentTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var OrderItemAdjustment $orderItemAdjustment
     */
    private $orderItemAdjustment;

    /**
     * {@inheritDoc}
     */
    protected function setup()
    {
        $this->orderItemAdjustment = new OrderItemAdjustment();
    }

    /**
     * @test
     */
    public function it_should_implement_order_item_adjustment_interface()
    {
        $this->assertInstanceOf('\LMammino\EFoundation\Order\Model\OrderItemAdjustment', $this->orderItemAdjustment);
    }

    /**
     * @test
     */
    public function it_should_handle_an_order_item()
    {
        $orderItem = $this->getMock('\LMammino\EFoundation\Order\Model\OrderItemInterface');
        $this->orderItemAdjustment->setOrderItem($orderItem);
        $this->assertSame($orderItem, $this->orderItemAdjustment->getOrderItem());
        $this->assertSame($this->orderItemAdjustment->getOrderItem(), $this->orderItemAdjustment->getAdjustable());
    }
}
