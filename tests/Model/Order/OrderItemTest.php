<?php

namespace LMammino\EFoundation\Tests\Model\Order;

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
    public function it_should_handle_adjustments()
    {
        $adjustments = $this->getMock('\Doctrine\Common\Collections\Collection');
        $this->orderItem->setAdjustments($adjustments);
        $this->assertSame($adjustments, $this->orderItem->getAdjustments());
    }

    /**
     * @test
     */
    public function it_should_add_an_adjustment()
    {
        $adjustment = $this->getMock('\LMammino\EFoundation\Model\Order\AdjustmentInterface');
        $adjustment->expects($this->once())
                    ->method('setAdjustable')
                    ->with($this->orderItem);
        $this->orderItem->addAdjustment($adjustment);
        $this->assertContains($adjustment, $this->orderItem->getAdjustments());
    }

    /**
     * @test
     */
    public function it_should_check_if_has_an_adjustment()
    {
        $adjustment = $this->getMock('\LMammino\EFoundation\Model\Order\AdjustmentInterface');
        $this->orderItem->addAdjustment($adjustment);
        $this->assertTrue($this->orderItem->hasAdjustment($adjustment));
    }

    /**
     * @test
     */
    public function it_should_remove_an_adjustment()
    {
        $adjustment = $this->getMock('\LMammino\EFoundation\Model\Order\AdjustmentInterface');
        $this->orderItem->addAdjustment($adjustment);
        $this->assertTrue($this->orderItem->hasAdjustment($adjustment));
        $adjustment->expects($this->once())
                   ->method('setAdjustable')
                   ->with(null);
        $this->orderItem->removeAdjustment($adjustment);
        $this->assertFalse($this->orderItem->hasAdjustment($adjustment));
    }

    /**
     * @test
     */
    public function it_should_clear_adjustments()
    {
        $this->orderItem->addAdjustment($this->getMock('\LMammino\EFoundation\Model\Order\AdjustmentInterface'));
        $this->orderItem->addAdjustment($this->getMock('\LMammino\EFoundation\Model\Order\AdjustmentInterface'));
        $this->assertNotEmpty($this->orderItem->getAdjustments());
        $this->orderItem->clearAdjustments();
        $this->assertEmpty($this->orderItem->getAdjustments());
    }

    /**
     * @test
     */
    public function it_should_calculate_adjustments_total()
    {
        $adjustment1 = $this->getMock('\LMammino\EFoundation\Model\Order\AdjustmentInterface');
        $adjustment1->expects($this->once())
                    ->method('getAmount')
                    ->willReturn(17);

        $adjustment2 = $this->getMock('\LMammino\EFoundation\Model\Order\AdjustmentInterface');
        $adjustment2->expects($this->once())
                    ->method('getAmount')
                    ->willReturn(-13);

        $adjustment3 = $this->getMock('\LMammino\EFoundation\Model\Order\AdjustmentInterface');
        $adjustment3->expects($this->never())
                    ->method('getAmount');
        $adjustment3->expects($this->once())
                    ->method('isNeutral')
                    ->willReturn(true);

        $this->orderItem->addAdjustment($adjustment1)
                        ->addAdjustment($adjustment2)
                        ->addAdjustment($adjustment3);

        $expectedTotal = 4;

        $this->assertEquals($expectedTotal, $this->orderItem->getAdjustmentTotal());
    }

    /**
     * @test
     */
    public function it_should_dinamically_recalculate_adjustments_total()
    {
        $adjustment1 = $this->getMock('\LMammino\EFoundation\Model\Order\AdjustmentInterface');
        $adjustment1->expects($this->exactly(2))
            ->method('getAmount')
            ->willReturn(17);

        $adjustment2 = $this->getMock('\LMammino\EFoundation\Model\Order\AdjustmentInterface');
        $adjustment2->expects($this->exactly(2))
                    ->method('getAmount')
                    ->willReturn(-13);

        $adjustment3 = $this->getMock('\LMammino\EFoundation\Model\Order\AdjustmentInterface');
        $adjustment3->expects($this->never())
            ->method('getAmount');
        $adjustment3->expects($this->exactly(2))
            ->method('isNeutral')
            ->willReturn(true);

        $this->orderItem->addAdjustment($adjustment1)
            ->addAdjustment($adjustment2)
            ->addAdjustment($adjustment3);

        $this->assertEquals(4, $this->orderItem->getAdjustmentTotal());

        $adjustment4 = $this->getMock('\LMammino\EFoundation\Model\Order\AdjustmentInterface');
        $adjustment4->expects($this->once())
                    ->method('getAmount')
                    ->willReturn(-4);

        $this->orderItem->addAdjustment($adjustment4);

        $this->assertEquals(0, $this->orderItem->getAdjustmentTotal());
    }

    /**
     * @test
     */
    public function it_should_not_add_the_same_adjustment_twice()
    {
        $adjustment = $this->getMock('\LMammino\EFoundation\Model\Order\AdjustmentInterface');

        $this->orderItem->addAdjustment($adjustment)
                        ->addAdjustment($adjustment);

        $this->assertCount(1, $this->orderItem->getAdjustments());
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
 