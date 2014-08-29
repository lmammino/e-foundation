<?php

namespace LMammino\EFoundation\Tests\Cart\Model;

use LMammino\EFoundation\Cart\Model\CartAwareInterface;
use LMammino\EFoundation\Cart\Model\CartAwareTrait;

/**
 * Class DummyCartAware
 *
 * @package LMammino\EFoundation\Tests\Cart\Model
 */
class DummyCartAware implements CartAwareInterface
{
    use CartAwareTrait;
}
