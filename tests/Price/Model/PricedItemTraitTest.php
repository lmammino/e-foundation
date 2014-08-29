<?php

namespace LMammino\EFoundation\Tests\Price\Model;

/**
 * Class PricedItemTraitTest
 *
 * @package LMammino\EFoundation\Tests\Price\Model
 */
class PricedItemTraitTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var DummyPricedItem
     */
    private $pricedItem;

    /**
     * {@inheritDoc}
     */
    protected function setup()
    {
        $this->pricedItem = new DummyPricedItem();
    }

    /**
     * @test
     */
    public function it_should_handle_a_container()
    {
        $container = $this->getMock('\LMammino\EFoundation\Price\Model\PricedItemsContainerInterface');
        $this->pricedItem->setContainer($container);
        $this->assertSame($container, $this->pricedItem->getContainer());
    }

    /**
     * @test
     */
    public function it_should_handle_quantity()
    {
        $quantity = 2.4;
        $this->pricedItem->setQuantity($quantity);
        $this->assertSame($quantity, $this->pricedItem->getQuantity());
    }

    /**
     * @test
     */
    public function it_should_have_one_as_default_quantity()
    {
        $this->assertEquals(1, $this->pricedItem->getQuantity());
    }

    /**
     * @test
     */
    public function it_should_handle_a_unit_price()
    {
        $unitPrice = 1700;
        $this->pricedItem->setUnitPrice($unitPrice);
        $this->assertSame($unitPrice, $this->pricedItem->getUnitPrice());
    }

    /**
     * @test
     */
    public function it_should_handle_a_total()
    {
        $total = 1700;
        $this->pricedItem->setTotal($total);
        $this->assertSame($total, $this->pricedItem->getTotal());
    }

    /**
     * @test
     */
    public function it_should_calculate_total()
    {
        $quantity = 2.5;
        $unitPrice = 10;
        $expectedTotal = 25;

        $this->pricedItem->setQuantity($quantity)
            ->setUnitPrice($unitPrice);

        $this->assertEquals($expectedTotal, $this->pricedItem->getTotal());
    }

    /**
     * @test
     */
    public function it_should_convert_negative_total_to_zero()
    {
        $quantity = 2.5;
        $unitPrice = -10;
        $expectedTotal = 0;

        $this->pricedItem->setQuantity($quantity)
            ->setUnitPrice($unitPrice);

        $this->assertEquals($expectedTotal, $this->pricedItem->getTotal());
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

        $adjustment = $this->getMock('\LMammino\EFoundation\Order\Model\AdjustmentInterface');
        $adjustment->expects($this->once())
            ->method('getAmount')
            ->willReturn($discount);

        $this->pricedItem->setQuantity($quantity)
            ->setUnitPrice($unitPrice)
            ->addAdjustment($adjustment);

        $this->assertEquals($expectedTotal, $this->pricedItem->getTotal());
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

        $adjustment = $this->getMock('\LMammino\EFoundation\Order\Model\AdjustmentInterface');
        $adjustment->expects($this->once())
            ->method('getAmount')
            ->willReturn($discount);

        $this->pricedItem->setQuantity($quantity)
            ->setUnitPrice($unitPrice);

        $this->assertEquals($expectedTotal1, $this->pricedItem->getTotal());

        $this->pricedItem->addAdjustment($adjustment);

        $this->assertEquals($expectedTotal2, $this->pricedItem->getTotal());
    }

    /**
     * @test
     */
    public function it_should_have_a_default_total_of_zero()
    {
        $this->assertEquals(0, $this->pricedItem->getTotal());
    }

    /**
     * @test
     */
    public function it_should_recalculate_total_on_pre_persist()
    {
        $quantity = 2.5;
        $unitPrice = 10;
        $discount = -10;
        $expectedTotal1 = 25;
        $expectedTotal2 = 15;

        $adjustment = $this->getMock('\LMammino\EFoundation\Order\Model\AdjustmentInterface');
        $adjustment->expects($this->exactly(2))
                   ->method('getAmount')
                   ->willReturn($discount);

        $this->pricedItem->setQuantity($quantity)
                         ->setUnitPrice($unitPrice);

        $this->assertEquals($expectedTotal1, $this->pricedItem->getTotal());

        $this->pricedItem->addAdjustment($adjustment);

        $this->pricedItem->onPrePersist();

        $this->assertEquals($expectedTotal2, $this->getObjectAttribute($this->pricedItem, 'total'));
    }

    /**
     * @test
     */
    public function it_should_recalculate_total_on_pre_update()
    {
        $quantity = 2.5;
        $unitPrice = 10;
        $discount = -10;
        $expectedTotal1 = 25;
        $expectedTotal2 = 15;

        $adjustment = $this->getMock('\LMammino\EFoundation\Order\Model\AdjustmentInterface');
        $adjustment->expects($this->exactly(2))
                   ->method('getAmount')
                   ->willReturn($discount);

        $this->pricedItem->setQuantity($quantity)
                         ->setUnitPrice($unitPrice);

        $this->assertEquals($expectedTotal1, $this->pricedItem->getTotal());

        $this->pricedItem->addAdjustment($adjustment);

        $this->pricedItem->onPreUpdate();

        $this->assertEquals($expectedTotal2, $this->getObjectAttribute($this->pricedItem, 'total'));
    }

    /**
     * @test
     */
    public function it_should_consider_two_different_priced_item_not_equal()
    {
        $pricedItem = $this->getMock('\LMammino\EFoundation\Price\Model\PricedItemInterface');
        $this->assertFalse($this->pricedItem->equals($pricedItem));
    }

    /**
     * @test
     */
    public function it_should_consider_the_same_order_item_instance_to_be_equal()
    {
        $this->assertTrue($this->pricedItem->equals($this->pricedItem));
    }

    /**
     * @test
     */
    public function it_should_merge_order_items()
    {
        $startQuantity = 10;
        $newQuantity = 20;
        $expectedQuantity = 30;

        $this->pricedItem->setQuantity($startQuantity);

        $orderItemToMerge = new DummyPricedItem();
        $orderItemToMerge->setQuantity($newQuantity);

        $this->pricedItem->merge($orderItemToMerge);

        $this->assertEquals($expectedQuantity, $this->pricedItem->getQuantity());
    }
}
