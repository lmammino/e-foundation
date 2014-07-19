<?php

namespace LMammino\EFoundation\tests\Model\Order;

use LMammino\EFoundation\Model\Order\Adjustment;

/**
 * Class AdjustmentTest
 *
 * @package Model\Order
 */
class AdjustmentTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Adjustment $adjustment
     */
    private $adjustment;

    /**
     * {@inheritDoc}
     */
    protected function setup()
    {
        $this->adjustment = new Adjustment();
    }

    /**
     * @test
     */
    public function it_should_implement_adjustment_interface()
    {
        $this->assertInstanceOf('\LMammino\EFoundation\Model\Order\AdjustmentInterface', $this->adjustment);
    }

    /**
     * @test
     */
    public function it_should_handle_an_adjustable()
    {
        $adjustable = $this->getMock('\LMammino\EFoundation\Model\Order\AdjustableInterface');
        $this->adjustment->setAdjustable($adjustable);
        $this->assertEquals($adjustable, $this->adjustment->getAdjustable());
    }

    /**
     * @test
     */
    public function it_should_clear_adjustable()
    {
        $this->adjustment->setAdjustable(null);
        $this->assertNull($this->adjustment->getAdjustable());
    }

    /**
     * @test
     */
    public function it_should_handle_a_label()
    {
        $label = 'New adjustment';
        $this->adjustment->setLabel($label);
        $this->assertEquals($label, $this->adjustment->getLabel());
    }

    /**
     * @test
     */
    public function it_should_handle_a_description()
    {
        $description = '10% discount for new member';
        $this->adjustment->setDescription($description);
        $this->assertEquals($description, $this->adjustment->getDescription());
    }

    /**
     * @test
     */
    public function it_should_handle_neutral()
    {
        $this->adjustment->setNeutral(true);
        $this->assertTrue($this->adjustment->isNeutral());
    }

    /**
     * @test
     */
    public function it_should_not_be_neutral_by_default()
    {
        $this->assertFalse($this->adjustment->isNeutral());
    }

    /**
     * @test
     */
    public function it_should_handle_an_amount()
    {
        $amount = 2250;
        $this->adjustment->setAmount($amount);
        $this->assertEquals($amount, $this->adjustment->getAmount());
    }

    /**
     * @test
     */
    public function it_should_have_null_amount_by_default()
    {
        $this->assertNull($this->adjustment->getAmount());
    }

    /**
     * @test
     */
    public function it_should_consider_positive_amount_as_charge()
    {
        $amount = 2250;
        $this->adjustment->setAmount($amount);
        $this->assertTrue($this->adjustment->isCharge());
        $this->assertFalse($this->adjustment->isCredit());
    }

    /**
     * @test
     */
    public function it_should_consider_negative_amount_as_credit()
    {
        $amount = -2250;
        $this->adjustment->setAmount($amount);
        $this->assertTrue($this->adjustment->isCredit());
        $this->assertFalse($this->adjustment->isCharge());
    }

    /**
     * @test
     */
    public function it_should_consider_no_charge_nor_credit_if_zero_amount()
    {
        $amount = 0;
        $this->adjustment->setAmount($amount);
        $this->assertFalse($this->adjustment->isCharge());
        $this->assertFalse($this->adjustment->isCredit());
    }

    /**
     * @test
     * @expectedException \BadMethodCallException
     */
    public function it_should_throw_exception_if_no_amount_has_been_given_and_is_credit_is_called()
    {
        $this->adjustment->isCredit();
    }

    /**
     * @test
     * @expectedException \BadMethodCallException
     */
    public function it_should_throw_exception_if_no_amount_has_been_given_and_is_charge_is_called()
    {
        $this->adjustment->isCharge();
    }

}
