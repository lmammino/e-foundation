<?php

namespace LMammino\EFoundation\Tests\Price\Model;

use LMammino\EFoundation\Price\Model\PricedItemsContainerInterface;
use LMammino\EFoundation\Price\Model\PricedItemsContainerTrait;

/**
 * Class DummyPricedItemsContainer
 *
 * @package LMammino\EFoundation\Tests\Price\Model
 */
class DummyPricedItemsContainer implements PricedItemsContainerInterface
{
    use PricedItemsContainerTrait;
}
