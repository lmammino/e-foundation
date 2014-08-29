<?php

namespace LMammino\EFoundation\Tests\Price\Model;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * Class PricedItemsContainerTraitTest
 *
 * @package LMammino\EFoundation\Tests\Price\Model
 */
class PricedItemsContainerTraitTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var DummyPricedItemsContainer $container
     */
    private $container;

    /**
     * {@inheritDoc}
     */
    protected function setup()
    {
        $this->container = new DummyPricedItemsContainer();
    }

    /**
     * @test
     */
    public function it_should_handle_a_currency()
    {
        $currency = 'EUR';
        $this->container->setCurrency($currency);
        $this->assertEquals($currency, $this->container->getCurrency());
    }

    /**
     * @test
     */
    public function it_should_handle_items()
    {
        $item = $this->getMock('\LMammino\EFoundation\Price\Model\PricedItemInterface');
        $item->expects($this->once())
             ->method('setContainer')
             ->with($this->container);

        $items = new ArrayCollection(array($item));
        $this->container->setItems($items);
        $this->assertContains($item, $this->container->getItems());
    }

    /**
     * @test
     */
    public function it_should_add_an_item()
    {
        $item = $this->getMock('\LMammino\EFoundation\Price\Model\PricedItemInterface');
        $this->container->addItem($item);
        $this->assertContains($item, $this->container->getItems());
    }

    /**
     * @test
     */
    public function it_should_not_add_the_same_item_twice()
    {
        $item = $this->getMock('\LMammino\EFoundation\Price\Model\PricedItemInterface');
        $this->container->addItem($item);
        $this->assertEquals(1, $this->container->countItems());
        $this->container->addItem($item);
        $this->assertEquals(1, $this->container->countItems());
    }

    /**
     * @test
     */
    public function it_should_merge_same_item()
    {
        $item1 = $this->getMock('\LMammino\EFoundation\Price\Model\PricedItemInterface');
        $item2 = $this->getMock('\LMammino\EFoundation\Price\Model\PricedItemInterface');

        $item2->expects($this->atLeast(1))
              ->method('equals')
              ->with($item1)
              ->willReturn(true);

        $item1->expects($this->once())
              ->method('merge')
              ->with($item2);

        $this->container->addItem($item1)
             ->addItem($item2);
    }

    /**
     * @test
     */
    public function it_should_check_if_has_a_given_item()
    {
        $item = $this->getMock('\LMammino\EFoundation\Price\Model\PricedItemInterface');
        $this->container->addItem($item);
        $this->assertTrue($this->container->hasItem($item));
    }

    /**
     * @test
     */
    public function it_should_remove_a_given_item()
    {
        $item = $this->getMock('\LMammino\EFoundation\Price\Model\PricedItemInterface');
        $this->assertFalse($this->container->hasItem($item));
        $this->container->addItem($item);
        $this->assertTrue($this->container->hasItem($item));
        $this->container->removeItem($item);
        $this->assertFalse($this->container->hasItem($item));
    }

    /**
     * @test
     */
    public function it_should_count_items()
    {
        $item1 = $this->getMock('\LMammino\EFoundation\Price\Model\PricedItemInterface');
        $item2 = $this->getMock('\LMammino\EFoundation\Price\Model\PricedItemInterface');
        $this->container->addItem($item1);
        $this->assertEquals(1, $this->container->countItems());
        $this->container->addItem($item2);
        $this->assertEquals(2, $this->container->countItems());
    }

    /**
     * @test
     */
    public function it_should_check_if_empty()
    {
        $item = $this->getMock('\LMammino\EFoundation\Price\Model\PricedItemInterface');
        $this->container->addItem($item);
        $this->assertFalse($this->container->isEmpty());
        $this->container->removeItem($item);
        $this->assertTrue($this->container->isEmpty());
    }

    /**
     * @test
     */
    public function it_should_be_empty_by_default()
    {
        $this->assertTrue($this->container->isEmpty());
    }

    /**
     * @test
     */
    public function it_should_clear_items()
    {
        $item1 = $this->getMock('\LMammino\EFoundation\Price\Model\PricedItemInterface');
        $item2 = $this->getMock('\LMammino\EFoundation\Price\Model\PricedItemInterface');
        $this->container->addItem($item1)
             ->addItem($item2);
        $this->container->clearItems();
        $this->assertTrue($this->container->isEmpty());
    }

    /**
     * @test
     */
    public function it_should_calculate_items_total()
    {
        $price1 = 100;
        $price2 = 200;
        $expectedPrice = $price1 + $price2;

        $item1 = $this->getMock('\LMammino\EFoundation\Price\Model\PricedItemInterface');
        $item1->expects($this->once())
              ->method('getTotal')
              ->willReturn($price1);

        $item2 = $this->getMock('\LMammino\EFoundation\Price\Model\PricedItemInterface');
        $item2->expects($this->once())
              ->method('getTotal')
              ->willReturn($price2);

        $this->container->addItem($item1)
             ->addItem($item2);

        $this->assertEquals($expectedPrice, $this->container->getItemsTotal());
    }

    /**
     * @test
     */
    public function it_should_have_zero_as_default_items_total()
    {
        $this->assertEquals(0, $this->container->getItemsTotal());
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

        $item1 = $this->getMock('\LMammino\EFoundation\Price\Model\PricedItemInterface');
        $item1->expects($this->atLeast(2))
              ->method('getTotal')
              ->willReturn($price1);

        $item2 = $this->getMock('\LMammino\EFoundation\Price\Model\PricedItemInterface');
        $item2->expects($this->atLeast(1))
              ->method('getTotal')
              ->willReturn($price2);

        $this->container->addItem($item1);

        $this->assertEquals($expectedPrice1, $this->container->getItemsTotal());

        $this->container->addItem($item2);

        $this->assertEquals($expectedPrice2, $this->container->getItemsTotal());
    }

    /**
     * @test
     */
    public function it_should_handle_a_total()
    {
        $total = 1000;
        $this->container->setTotal($total);
        $this->assertEquals($total, $this->container->getTotal());
    }

    /**
     * @test
     */
    public function it_should_have_zero_as_default_total()
    {
        $this->assertEquals(0, $this->container->getTotal());
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

        $item1 = $this->getMock('\LMammino\EFoundation\Price\Model\PricedItemInterface');
        $item1->expects($this->once())
              ->method('getTotal')
              ->willReturn($price1);

        $item2 = $this->getMock('\LMammino\EFoundation\Price\Model\PricedItemInterface');
        $item2->expects($this->once())
              ->method('getTotal')
              ->willReturn($price2);

        $adjustment = $this->getMock('\LMammino\EFoundation\Order\Model\AdjustmentInterface');
        $adjustment->expects($this->once())
                   ->method('getAmount')
                   ->willReturn($adjustmentPrice);

        $this->container->addItem($item1)
                        ->addItem($item2)
                        ->addAdjustment($adjustment);

        $this->assertEquals($expectedTotal, $this->container->getTotal());
    }

    /**
     * @test
     */
    public function it_should_convert_negative_total_to_zero()
    {
        $price = 100;
        $adjustmentPrice = -150;
        $expectedTotal = 0;

        $item = $this->getMock('\LMammino\EFoundation\Price\Model\PricedItemInterface');
        $item->expects($this->once())
             ->method('getTotal')
             ->willReturn($price);

        $adjustment = $this->getMock('\LMammino\EFoundation\Order\Model\AdjustmentInterface');
        $adjustment->expects($this->once())
                   ->method('getAmount')
                   ->willReturn($adjustmentPrice);

        $this->container->addItem($item)
                        ->addAdjustment($adjustment);

        $this->assertEquals($expectedTotal, $this->container->getTotal());
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

        $item1 = $this->getMock('\LMammino\EFoundation\Price\Model\PricedItemInterface');
        $item1->expects($this->atLeast(2))
              ->method('getTotal')
              ->willReturn($price1);

        $item2 = $this->getMock('\LMammino\EFoundation\Price\Model\PricedItemInterface');
        $item2->expects($this->atLeast(1))
              ->method('getTotal')
              ->willReturn($price2);

        $adjustment = $this->getMock('\LMammino\EFoundation\Order\Model\AdjustmentInterface');
        $adjustment->expects($this->atLeast(1))
                   ->method('getAmount')
                   ->willReturn($adjustmentPrice);

        $this->container->addItem($item1);
        $this->assertEquals($expectedTotal1, $this->container->getTotal());

        $this->container->addItem($item2);
        $this->assertEquals($expectedTotal2, $this->container->getItemsTotal());
        $this->assertEquals($expectedTotal2, $this->container->getTotal());

        $this->container->addAdjustment($adjustment);
        $this->assertEquals($expectedTotal3, $this->container->getTotal());
    }

    /**
     * @test
     */
    public function it_should_recalculate_items_total_on_pre_persist()
    {
        $price1 = 100;
        $price2 = 200;
        $expectedTotal1 = $price1;
        $expectedTotal2 = $price1 + $price2;

        $item1 = $this->getMock('\LMammino\EFoundation\Price\Model\PricedItemInterface');
        $item1->expects($this->atLeast(2))
              ->method('getTotal')
              ->willReturn($price1);

        $item2 = $this->getMock('\LMammino\EFoundation\Price\Model\PricedItemInterface');
        $item2->expects($this->atLeast(1))
              ->method('getTotal')
              ->willReturn($price2);

        $this->container->addItem($item1);
        $this->assertEquals($expectedTotal1, $this->container->getTotal());

        $this->container->addItem($item2);
        $this->container->onPrePersist();

        $this->assertEquals($expectedTotal2, $this->getObjectAttribute($this->container, 'itemsTotal'));
    }

    /**
     * @test
     */
    public function it_should_recalculate_items_total_on_pre_update()
    {
        $price1 = 100;
        $price2 = 200;
        $expectedTotal1 = $price1;
        $expectedTotal2 = $price1 + $price2;

        $item1 = $this->getMock('\LMammino\EFoundation\Price\Model\PricedItemInterface');
        $item1->expects($this->atLeast(2))
              ->method('getTotal')
              ->willReturn($price1);

        $item2 = $this->getMock('\LMammino\EFoundation\Price\Model\PricedItemInterface');
        $item2->expects($this->atLeast(1))
              ->method('getTotal')
              ->willReturn($price2);

        $this->container->addItem($item1);
        $this->assertEquals($expectedTotal1, $this->container->getTotal());

        $this->container->addItem($item2);
        $this->container->onPreUpdate();

        $this->assertEquals($expectedTotal2, $this->getObjectAttribute($this->container, 'itemsTotal'));
    }

    /**
     * @test
     */
    public function it_should_recalculate_total_on_pre_persist()
    {
        $price1 = 100;
        $price2 = 200;
        $adjustmentPrice = -50;
        $expectedTotal1 = $price1;
        $expectedTotal2 = $price1 + $price2 + $adjustmentPrice;

        $item1 = $this->getMock('\LMammino\EFoundation\Price\Model\PricedItemInterface');
        $item1->expects($this->atLeast(2))
              ->method('getTotal')
              ->willReturn($price1);

        $item2 = $this->getMock('\LMammino\EFoundation\Price\Model\PricedItemInterface');
        $item2->expects($this->atLeast(1))
              ->method('getTotal')
              ->willReturn($price2);

        $adjustment = $this->getMock('\LMammino\EFoundation\Order\Model\AdjustmentInterface');
        $adjustment->expects($this->atLeast(1))
                   ->method('getAmount')
                   ->willReturn($adjustmentPrice);

        $this->container->addItem($item1);
        $this->assertEquals($expectedTotal1, $this->container->getTotal());

        $this->container->addItem($item2)
             ->addAdjustment($adjustment);

        $this->container->onPrePersist();

        $this->assertEquals($expectedTotal2, $this->getObjectAttribute($this->container, 'total'));
    }

    /**
     * @test
     */
    public function it_should_recalculate_total_on_pre_update()
    {
        $price1 = 100;
        $price2 = 200;
        $adjustmentPrice = -50;
        $expectedTotal1 = $price1;
        $expectedTotal2 = $price1 + $price2 + $adjustmentPrice;

        $item1 = $this->getMock('\LMammino\EFoundation\Price\Model\PricedItemInterface');
        $item1->expects($this->atLeast(2))
              ->method('getTotal')
              ->willReturn($price1);

        $item2 = $this->getMock('\LMammino\EFoundation\Price\Model\PricedItemInterface');
        $item2->expects($this->atLeast(1))
              ->method('getTotal')
              ->willReturn($price2);

        $adjustment = $this->getMock('\LMammino\EFoundation\Order\Model\AdjustmentInterface');
        $adjustment->expects($this->atLeast(1))
                   ->method('getAmount')
                   ->willReturn($adjustmentPrice);

        $this->container->addItem($item1);
        $this->assertEquals($expectedTotal1, $this->container->getTotal());

        $this->container->addItem($item2)
             ->addAdjustment($adjustment);

        $this->container->onPreUpdate();

        $this->assertEquals($expectedTotal2, $this->getObjectAttribute($this->container, 'total'));
    }
}
