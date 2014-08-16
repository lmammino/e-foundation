<?php

namespace LMammino\EFoundation\tests\Order\Model;

/**
 * Class OrderAwareTraitTest
 *
 * @package LMammino\EFoundation\tests\Order\Model
 */
class OrderAwareTraitTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \LMammino\EFoundation\Order\Model\OrderAwareTrait $orderAware
     */
    private $orderAware;

    /**
     * {@inheritDoc}
     */
    protected function setup()
    {
        $this->orderAware = $this->getMockForTrait('\LMammino\EFoundation\Order\Model\OrderAwareTrait');
    }

    /**
     * @test
     */
    public function it_should_handle_an_order()
    {
        $order = $this->getMock('\LMammino\EFoundation\Order\Model\OrderInterface');
        $this->orderAware->setOrder($order);
        $this->assertSame($order, $this->orderAware->getOrder());
    }
}
