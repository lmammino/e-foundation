<?php

namespace LMammino\EFoundation\tests\Dummy\Model\Order;

use LMammino\EFoundation\Order\Model\AdjustableInterface;
use LMammino\EFoundation\Order\Model\AdjustableTrait;

/**
 * Class DummyAdjustable
 *
 * @package LMammino\EFoundation\tests\Dummy\Model\Order
 */
abstract class DummyAdjustable implements AdjustableInterface
{
    use AdjustableTrait;
}
