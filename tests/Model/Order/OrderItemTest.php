<?php

namespace LMammino\EFoundation\tests\Model\Order;

use LMammino\EFoundation\Model\Order\OrderItem;

/**
 * Class OrderItemTest
 *
 * @package LMammino\EFoundation\Tests\Model\Order
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
        $this->assertInstanceOf('\LMammino\EFoundation\Model\Order\OrderItemInterface', $this->orderItem);
    }

    /**
     * @test
     */
    public function it_should_handle_quantity()
    {
        $quantity = 2.4;
        $this->orderItem->setQuantity($quantity);
        $this->assertSame($quantity, $this->orderItem->getQuantity());
    }

    /**
     * @test
     */
    public function it_should_have_one_as_default_quantity()
    {
        $this->assertEquals(1, $this->orderItem->getQuantity());
    }

    /**
     * @test
     */
    public function it_should_handle_a_unit_price()
    {
        $unitPrice = 1700;
        $this->orderItem->setUnitPrice($unitPrice);
        $this->assertSame($unitPrice, $this->orderItem->getUnitPrice());
    }

    /**
     * @test
     */
    public function it_should_handle_a_total()
    {
        $total = 1700;
        $this->orderItem->setTotal($total);
        $this->assertSame($total, $this->orderItem->getTotal());
    }

    /**
     * @test
     */
    public function it_should_calculate_total()
    {
        $quantity = 2.5;
        $unitPrice = 10;
        $expectedTotal = 25;

        $this->orderItem->setQuantity($quantity)
                        ->setUnitPrice($unitPrice);

        $this->assertEquals($expectedTotal, $this->orderItem->getTotal());
    }

    /**
     * @test
     */
    public function it_should_calculate_total_including_adjustments()
    {
        $quantity = 2.5;
        $unitPrice = 10;
        $discount = -10;
        $expectedTotal = 15;

        $adjustment = $this->getMock('\LMammino\EFoundation\Model\Order\AdjustmentInterface');
        $adjustment->expects($this->once())
                    ->method('getAmount')
                    ->willReturn($discount);

        $this->orderItem->setQuantity($quantity)
                        ->setUnitPrice($unitPrice)
                        ->addAdjustment($adjustment);

        $this->assertEquals($expectedTotal, $this->orderItem->getTotal());
    }

    /**
     * @test
     */
    public function it_should_recalculate_total_when_needed()
    {
        $quantity = 2.5;
        $unitPrice = 10;
        $discount = -10;
        $expectedTotal1 = 25;
        $expectedTotal2 = 15;

        $adjustment = $this->getMock('\LMammino\EFoundation\Model\Order\AdjustmentInterface');
        $adjustment->expects($this->once())
                   ->method('getAmount')
                   ->willReturn($discount);

        $this->orderItem->setQuantity($quantity)
                        ->setUnitPrice($unitPrice);

        $this->assertEquals($expectedTotal1, $this->orderItem->getTotal());

        $this->orderItem->addAdjustment($adjustment);

        $this->assertEquals($expectedTotal2, $this->orderItem->getTotal());
    }

    /**
     * @test
     */
    public function it_should_have_a_default_total_of_zero()
    {
        $this->assertEquals(0, $this->orderItem->getTotal());
    }

    /**
     * @test
     */
    public function it_should_consider_the_same_order_item_instance_to_be_equal()
    {
        $this->assertTrue($this->orderItem->equals($this->orderItem));
    }

    /**
     * @test
     */
    public function it_should_merge_order_items()
    {
        $startQuantity = 10;
        $newQuantity = 20;
        $expectedQuantity = 30;

        $this->orderItem->setQuantity($startQuantity);

        $orderItemToMerge = new OrderItem();
        $orderItemToMerge->setQuantity($newQuantity);

        $this->orderItem->merge($orderItemToMerge);

        $this->assertEquals($expectedQuantity, $this->orderItem->getQuantity());
    }

}
