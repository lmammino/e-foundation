<?php


namespace LMammino\EFoundation\Tests\Dummy\Model\Order;

use LMammino\EFoundation\Model\Order\AdjustableInterface;
use LMammino\EFoundation\Model\Order\AdjustableTrait;

abstract class DummyAdjustable implements AdjustableInterface
{

    use AdjustableTrait;

} 