<?php

namespace LMammino\EFoundation\tests\Model\Order;

use LMammino\EFoundation\Model\Order\Order;

/**
 * Class OrderTest
 *
 * @package LMammino\EFoundation\Tests\Model\Order
 */
class OrderTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \LMammino\EFoundation\Model\Order\Order $order
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
        $this->assertInstanceOf('\LMammino\EFoundation\Model\Order\OrderInterface', $this->order);
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

        $diff = $now->diff($completedAt);

        $this->assertEquals(0, $diff->y);
        $this->assertEquals(0, $diff->m);
        $this->assertEquals(0, $diff->d);
        $this->assertEquals(0, $diff->h);
        $this->assertEquals(0, $diff->i);
        $this->assertTrue(0 <= $diff->s && 1 > $diff->s);
    }

    /**
     * @test
     */
    public function it_should_not_be_complete_by_default()
    {
        $this->assertFalse($this->order->isCompleted());
    }

    /**
     * @test
     */
    public function it_should_handle_items()
    {
        $items = $this->getMock('\Doctrine\Common\Collections\Collection');
        $this->order->setItems($items);
        $this->assertSame($items, $this->order->getItems());
    }

    /**
     * @test
     */
    public function it_should_add_an_item()
    {
        $item = $this->getMock('\LMammino\EFoundation\Model\Order\OrderItemInterface');
        $this->order->addItem($item);
        $this->assertContains($item, $this->order->getItems());
    }

    /**
     * @test
     */
    public function it_should_not_add_the_same_item_twice()
    {
        $item = $this->getMock('\LMammino\EFoundation\Model\Order\OrderItemInterface');
        $this->order->addItem($item);
        $this->assertEquals(1, $this->order->countItems());
        $this->order->addItem($item);
        $this->assertEquals(1, $this->order->countItems());
    }

    /**
     * @test
     */
    public function it_should_merge_same_item()
    {
        $item1 = $this->getMock('\LMammino\EFoundation\Model\Order\OrderItemInterface');
        $item2 = $this->getMock('\LMammino\EFoundation\Model\Order\OrderItemInterface');

        $item2->expects($this->atLeast(1))
              ->method('equals')
              ->with($item1)
              ->willReturn(true);

        $item1->expects($this->once())
              ->method('merge')
              ->with($item2);

        $this->order->addItem($item1)
                    ->addItem($item2);
    }

    /**
     * @test
     */
    public function it_should_check_if_has_a_given_item()
    {
        $item = $this->getMock('\LMammino\EFoundation\Model\Order\OrderItemInterface');
        $this->order->addItem($item);
        $this->assertTrue($this->order->hasItem($item));
    }

    /**
     * @test
     */
    public function it_should_remove_a_given_item()
    {
        $item = $this->getMock('\LMammino\EFoundation\Model\Order\OrderItemInterface');
        $this->assertFalse($this->order->hasItem($item));
        $this->order->addItem($item);
        $this->assertTrue($this->order->hasItem($item));
        $this->order->removeItem($item);
        $this->assertFalse($this->order->hasItem($item));
    }

    /**
     * @test
     */
    public function it_should_count_items()
    {
        $item1 = $this->getMock('\LMammino\EFoundation\Model\Order\OrderItemInterface');
        $item2 = $this->getMock('\LMammino\EFoundation\Model\Order\OrderItemInterface');
        $this->order->addItem($item1);
        $this->assertEquals(1, $this->order->countItems());
        $this->order->addItem($item2);
        $this->assertEquals(2, $this->order->countItems());
    }

    /**
     * @test
     */
    public function it_should_check_if_empty()
    {
        $item = $this->getMock('\LMammino\EFoundation\Model\Order\OrderItemInterface');
        $this->order->addItem($item);
        $this->assertFalse($this->order->isEmpty());
        $this->order->removeItem($item);
        $this->assertTrue($this->order->isEmpty());
    }

    /**
     * @test
     */
    public function it_should_be_empty_by_default()
    {
        $this->assertTrue($this->order->isEmpty());
    }

    /**
     * @test
     */
    public function it_should_clear_items()
    {
        $item1 = $this->getMock('\LMammino\EFoundation\Model\Order\OrderItemInterface');
        $item2 = $this->getMock('\LMammino\EFoundation\Model\Order\OrderItemInterface');
        $this->order->addItem($item1)
                    ->addItem($item2);
        $this->order->clearItems();
        $this->assertTrue($this->order->isEmpty());
    }

    /**
     * @test
     */
    public function it_should_calculate_items_total()
    {
        $price1 = 100;
        $price2 = 200;
        $expectedPrice = $price1 + $price2;

        $item1 = $this->getMock('\LMammino\EFoundation\Model\Order\OrderItemInterface');
        $item1->expects($this->once())
              ->method('getTotal')
              ->willReturn($price1);

        $item2 = $this->getMock('\LMammino\EFoundation\Model\Order\OrderItemInterface');
        $item2->expects($this->once())
            ->method('getTotal')
            ->willReturn($price2);

        $this->order->addItem($item1)
                    ->addItem($item2);

        $this->assertEquals($expectedPrice, $this->order->getItemsTotal());
    }

    /**
     * @test
     */
    public function it_should_have_zero_as_default_items_total()
    {
        $this->assertEquals(0, $this->order->getItemsTotal());
    }

    /**
     * @test
     */
    public function it_should_recalculate_items_total_when_needed()
    {
        $price1 = 100;
        $price2 = 200;
        $expectedPrice1 = $price1;
        $expectedPrice2 = $price1 + $price2;

        $item1 = $this->getMock('\LMammino\EFoundation\Model\Order\OrderItemInterface');
        $item1->expects($this->atLeast(2))
              ->method('getTotal')
              ->willReturn($price1);

        $item2 = $this->getMock('\LMammino\EFoundation\Model\Order\OrderItemInterface');
        $item2->expects($this->atLeast(1))
              ->method('getTotal')
              ->willReturn($price2);

        $this->order->addItem($item1);

        $this->assertEquals($expectedPrice1, $this->order->getItemsTotal());

        $this->order->addItem($item2);

        $this->assertEquals($expectedPrice2, $this->order->getItemsTotal());
    }

    /**
     * @test
     */
    public function it_should_handle_a_total()
    {
        $total = 1000;
        $this->order->setTotal($total);
        $this->assertEquals($total, $this->order->getTotal());
    }

    /**
     * @test
     */
    public function it_should_have_zero_as_default_total()
    {
        $this->assertEquals(0, $this->order->getTotal());
    }

    /**
     * @test
     */
    public function it_should_calculate_total()
    {
        $price1 = 100;
        $price2 = 200;
        $adjustmentPrice = -50;
        $expectedTotal = $price1 + $price2 + $adjustmentPrice;

        $item1 = $this->getMock('\LMammino\EFoundation\Model\Order\OrderItemInterface');
        $item1->expects($this->once())
              ->method('getTotal')
              ->willReturn($price1);

        $item2 = $this->getMock('\LMammino\EFoundation\Model\Order\OrderItemInterface');
        $item2->expects($this->once())
              ->method('getTotal')
              ->willReturn($price2);

        $adjustment = $this->getMock('\LMammino\EFoundation\Model\Order\AdjustmentInterface');
        $adjustment->expects($this->once())
                   ->method('getAmount')
                   ->willReturn($adjustmentPrice);

        $this->order->addItem($item1)
                    ->addItem($item2)
                    ->addAdjustment($adjustment);

        $this->assertEquals($expectedTotal, $this->order->getTotal());
    }

    /**
     * @test
     */
    public function it_should_recalculate_total_when_needed()
    {
        $price1 = 100;
        $price2 = 200;
        $adjustmentPrice = -50;
        $expectedTotal1 = $price1;
        $expectedTotal2 = $price1 + $price2;
        $expectedTotal3 = $price1 + $price2 + $adjustmentPrice;

        $item1 = $this->getMock('\LMammino\EFoundation\Model\Order\OrderItemInterface');
        $item1->expects($this->atLeast(2))
              ->method('getTotal')
              ->willReturn($price1);

        $item2 = $this->getMock('\LMammino\EFoundation\Model\Order\OrderItemInterface');
        $item2->expects($this->atLeast(1))
              ->method('getTotal')
              ->willReturn($price2);

        $adjustment = $this->getMock('\LMammino\EFoundation\Model\Order\AdjustmentInterface');
        $adjustment->expects($this->atLeast(1))
                   ->method('getAmount')
                   ->willReturn($adjustmentPrice);

        $this->order->addItem($item1);
        $this->assertEquals($expectedTotal1, $this->order->getTotal());

        $this->order->addItem($item2);
        $this->assertEquals($expectedTotal2, $this->order->getItemsTotal());
        $this->assertEquals($expectedTotal2, $this->order->getTotal());

        $this->order->addAdjustment($adjustment);
        $this->assertEquals($expectedTotal3, $this->order->getTotal());
    }

}
