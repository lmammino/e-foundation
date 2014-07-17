<?php

namespace LMammino\EFoundation\Tests\Model\Order;

/**
 * Class AdjustableTraitTest
 *
 * @package LMammino\EFoundation\Tests\Model\Order
 */
class AdjustableTraitTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \LMammino\EFoundation\Tests\Dummy\Model\Order\DummyAdjustable $adjustableTrait
     */
    private $adjustableTrait;

    /**
     * {@inheritDoc}
     */
    protected function setup()
    {
        $this->adjustableTrait = $this->getMockForAbstractClass('\LMammino\EFoundation\Tests\Dummy\Model\Order\DummyAdjustable');
    }

    /**
     * @test
     */
    public function it_should_handle_adjustments()
    {
        $adjustments = $this->getMock('\Doctrine\Common\Collections\Collection');
        $this->adjustableTrait->setAdjustments($adjustments);
        $this->assertSame($adjustments, $this->adjustableTrait->getAdjustments());
    }

    /**
     * @test
     */
    public function it_should_add_an_adjustment()
    {
        $adjustment = $this->getMock('\LMammino\EFoundation\Model\Order\AdjustmentInterface');
        $adjustment->expects($this->once())
            ->method('setAdjustable')
            ->with($this->adjustableTrait);
        $this->adjustableTrait->addAdjustment($adjustment);
        $this->assertContains($adjustment, $this->adjustableTrait->getAdjustments());
    }

    /**
     * @test
     */
    public function it_should_check_if_has_an_adjustment()
    {
        $adjustment = $this->getMock('\LMammino\EFoundation\Model\Order\AdjustmentInterface');
        $this->adjustableTrait->addAdjustment($adjustment);
        $this->assertTrue($this->adjustableTrait->hasAdjustment($adjustment));
    }

    /**
     * @test
     */
    public function it_should_remove_an_adjustment()
    {
        $adjustment = $this->getMock('\LMammino\EFoundation\Model\Order\AdjustmentInterface');
        $this->adjustableTrait->addAdjustment($adjustment);
        $this->assertTrue($this->adjustableTrait->hasAdjustment($adjustment));
        $adjustment->expects($this->once())
            ->method('setAdjustable')
            ->with(null);
        $this->adjustableTrait->removeAdjustment($adjustment);
        $this->assertFalse($this->adjustableTrait->hasAdjustment($adjustment));
    }

    /**
     * @test
     */
    public function it_should_clear_adjustments()
    {
        $this->adjustableTrait->addAdjustment($this->getMock('\LMammino\EFoundation\Model\Order\AdjustmentInterface'));
        $this->adjustableTrait->addAdjustment($this->getMock('\LMammino\EFoundation\Model\Order\AdjustmentInterface'));
        $this->assertNotEmpty($this->adjustableTrait->getAdjustments());
        $this->adjustableTrait->clearAdjustments();
        $this->assertEmpty($this->adjustableTrait->getAdjustments());
    }

    /**
     * @test
     */
    public function it_should_calculate_adjustments_total()
    {
        $adjustment1 = $this->getMock('\LMammino\EFoundation\Model\Order\AdjustmentInterface');
        $adjustment1->expects($this->once())
            ->method('getAmount')
            ->willReturn(17);

        $adjustment2 = $this->getMock('\LMammino\EFoundation\Model\Order\AdjustmentInterface');
        $adjustment2->expects($this->once())
            ->method('getAmount')
            ->willReturn(-13);

        $adjustment3 = $this->getMock('\LMammino\EFoundation\Model\Order\AdjustmentInterface');
        $adjustment3->expects($this->never())
            ->method('getAmount');
        $adjustment3->expects($this->once())
            ->method('isNeutral')
            ->willReturn(true);

        $this->adjustableTrait->addAdjustment($adjustment1)
            ->addAdjustment($adjustment2)
            ->addAdjustment($adjustment3);

        $expectedTotal = 4;

        $this->assertEquals($expectedTotal, $this->adjustableTrait->getAdjustmentTotal());
    }

    /**
     * @test
     */
    public function it_should_dinamically_recalculate_adjustments_total()
    {
        $adjustment1 = $this->getMock('\LMammino\EFoundation\Model\Order\AdjustmentInterface');
        $adjustment1->expects($this->exactly(2))
            ->method('getAmount')
            ->willReturn(17);

        $adjustment2 = $this->getMock('\LMammino\EFoundation\Model\Order\AdjustmentInterface');
        $adjustment2->expects($this->exactly(2))
            ->method('getAmount')
            ->willReturn(-13);

        $adjustment3 = $this->getMock('\LMammino\EFoundation\Model\Order\AdjustmentInterface');
        $adjustment3->expects($this->never())
            ->method('getAmount');
        $adjustment3->expects($this->exactly(2))
            ->method('isNeutral')
            ->willReturn(true);

        $this->adjustableTrait->addAdjustment($adjustment1)
            ->addAdjustment($adjustment2)
            ->addAdjustment($adjustment3);

        $this->assertEquals(4, $this->adjustableTrait->getAdjustmentTotal());

        $adjustment4 = $this->getMock('\LMammino\EFoundation\Model\Order\AdjustmentInterface');
        $adjustment4->expects($this->once())
            ->method('getAmount')
            ->willReturn(-4);

        $this->adjustableTrait->addAdjustment($adjustment4);

        $this->assertEquals(0, $this->adjustableTrait->getAdjustmentTotal());
    }

    /**
     * @test
     */
    public function it_should_not_add_the_same_adjustment_twice()
    {
        $adjustment = $this->getMock('\LMammino\EFoundation\Model\Order\AdjustmentInterface');

        $this->adjustableTrait->addAdjustment($adjustment)
            ->addAdjustment($adjustment);

        $this->assertCount(1, $this->adjustableTrait->getAdjustments());
    }
}
 