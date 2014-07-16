<?php

namespace LMammino\EFoundation\Tests\Model\Order;

/**
 * Class OrderAwareTraitTest
 *
 * @package LMammino\EFoundation\Tests\Model\Order
 */
class OrderAwareTraitTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \LMammino\EFoundation\Model\Order\OrderAwareTrait $orderAware
     */
    private $orderAware;

    /**
     * {@inheritDoc}
     */
    protected function setup()
    {
        $this->orderAware = $this->getMockForTrait('\LMammino\EFoundation\Model\Order\OrderAwareTrait');
    }

    /**
     * @test
     */
    public function it_should_handle_an_order()
    {
        $order = $this->getMock('\LMammino\EFoundation\Model\Order\OrderInterface');
        $this->orderAware->setOrder($order);
        $this->assertSame($order, $this->orderAware->getOrder());
    }
}
 