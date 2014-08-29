<?php

namespace LMammino\EFoundation\Tests\Price\Model;

use LMammino\EFoundation\Price\Model\PricedItemInterface;
use LMammino\EFoundation\Price\Model\PricedItemTrait;

/**
 * Class DummyPricedItem
 *
 * @package LMammino\EFoundation\Tests\Price\Model
 */
class DummyPricedItem implements PricedItemInterface
{
    use PricedItemTrait;
}
