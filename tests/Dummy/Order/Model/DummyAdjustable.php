<?php

namespace LMammino\EFoundation\tests\Dummy\Order\Model;

use LMammino\EFoundation\Order\Model\AdjustableInterface;
use LMammino\EFoundation\Order\Model\AdjustableTrait;

/**
 * Class DummyAdjustable
 *
 * @package LMammino\EFoundation\tests\Dummy\Order\Model
 */
abstract class DummyAdjustable implements AdjustableInterface
{
    use AdjustableTrait;
}
