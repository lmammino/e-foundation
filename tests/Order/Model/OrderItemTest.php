<?php

namespace LMammino\EFoundation\tests\Order\Model;

use LMammino\EFoundation\Order\Model\OrderItem;

/**
 * Class OrderItemTest
 *
 * @package LMammino\EFoundation\tests\Order\Model
 */
class OrderItemTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var OrderItem $orderItem
     */
    private $orderItem;

    /**
     * {@inheritDoc}
     */
    protected function setup()
    {
        $this->orderItem = new OrderItem();
    }

    /**
     * @test
     */
    public function it_should_implement_order_item_intarface()
    {
        $this->assertInstanceOf('\LMammino\EFoundation\Order\Model\OrderItemInterface', $this->orderItem);
    }

    /**
     * @test
     */
    public function it_should_handle_a_subject()
    {
        $subject = $this->getMock('\LMammino\EFoundation\Order\Model\OrderItemSubjectInterface');
        $this->orderItem->setSubject($subject);
        $this->assertSame($subject, $this->orderItem->getSubject());
    }
}
