<?php

namespace LMammino\EFoundation\Tests\Price\Model;

use LMammino\EFoundation\Price\Model\PricedItem;

/**
 * Class PricedItemTest
 *
 * @package LMammino\EFoundation\Tests\Price\Model
 */
class PricedItemTest extends \PHPUnit_Framework_TestCase {

    /**
     * @var PricedItem $pricedItem
     */
    private $pricedItem;

    /**
     * {@inheritDoc}
     */
    protected function setup()
    {
        $this->pricedItem = new PricedItem();
    }

    /**
     * @test
     */
    public function it_should_implement_priced_item_interface()
    {
        $this->assertInstanceOf('\LMammino\EFoundation\Price\Model\PricedItemInterface', $this->pricedItem);
    }
}
