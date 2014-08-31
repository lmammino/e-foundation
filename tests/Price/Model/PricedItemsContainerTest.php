<?php

namespace LMammino\EFoundation\Tests\Price\Model;

use LMammino\EFoundation\Price\Model\PricedItemsContainer;

/**
 * Class PricedItemsContainerTest
 *
 * @package LMammino\EFoundation\Tests\Price\Model
 */
class PricedItemsContainerTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var PricedItemsContainer $pricedItemsContainer
     */
    private $pricedItemsContainer;

    /**
     * {@inheritDoc}
     */
    protected function setup()
    {
        $this->pricedItemsContainer = new PricedItemsContainer();
    }

    /**
     * @test
     */
    public function it_should_implement_priced_items_container_interface()
    {
        $this->assertInstanceOf(
            '\LMammino\EFoundation\Price\Model\PricedItemsContainerInterface',
            $this->pricedItemsContainer
        );
    }
}
