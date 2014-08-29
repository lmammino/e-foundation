<?php

namespace LMammino\EFoundation\tests\Price\Model;

use LMammino\EFoundation\Price\Model\AdjustableInterface;
use LMammino\EFoundation\Price\Model\AdjustableTrait;

/**
 * Class DummyAdjustable
 *
 * @package LMammino\EFoundation\tests\Order\Model
 */
abstract class DummyAdjustable implements AdjustableInterface
{
    use AdjustableTrait;
}
