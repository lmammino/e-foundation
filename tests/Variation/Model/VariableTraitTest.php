<?php

namespace LMammino\EFoundation\Tests\Variation\Model;

use Doctrine\Common\Collections\ArrayCollection;
use LMammino\EFoundation\Tests\Dummy\Variation\Model\DummyVariable;

/**
 * Class VariableTraitTest
 *
 * @package LMammino\EFoundation\Tests\Variation\Model
 */
class VariableTraitTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \LMammino\EFoundation\Variation\Model\VariableInterface $variable
     */
    private $variable;

    /**
     * {@inheritDoc}
     */
    protected function setup()
    {
        $this->variable = new DummyVariable();
    }

    /**
     * @test
     */
    public function it_should_handle_variants()
    {
        $variant = $this->getMock('\LMammino\EFoundation\Variation\Model\VariantInterface');
        $variant->expects($this->once())
                ->method('setObject')
                ->with($this->variable);
        $variants = new ArrayCollection(array($variant));
        $this->variable->setVariants($variants);
        $this->assertContains($variant, $this->variable->getVariants());
    }

    /**
     * @test
     */
    public function it_should_get_the_master_variant()
    {
        $variant = $this->getMock('\LMammino\EFoundation\Variation\Model\VariantInterface');
        $masterVariant = $this->getMock('\LMammino\EFoundation\Variation\Model\VariantInterface');
        $masterVariant->expects($this->atLeast(1))
                      ->method('isMaster')
                      ->willReturn(true);

        $this->variable->addVariant($variant)
                       ->addVariant($masterVariant);
        $this->assertSame($masterVariant, $this->variable->getMasterVariant());
    }

    /**
     * @test
     */
    public function it_should_get_null_when_there_is_no_master_variant()
    {
        $variant1 = $this->getMock('\LMammino\EFoundation\Variation\Model\VariantInterface');
        $variant2 = $this->getMock('\LMammino\EFoundation\Variation\Model\VariantInterface');

        $this->variable->addVariant($variant1)
                       ->addVariant($variant2);

        $this->assertNull($this->variable->getMasterVariant());
    }

    /**
     * @test
     */
    public function it_should_add_a_master_variant()
    {
        $variant = $this->getMock('\LMammino\EFoundation\Variation\Model\VariantInterface');
        $variant->expects($this->once())
                ->method('setMaster')
                ->with(true);
        $variant->expects($this->once())
                ->method('isMaster')
                ->willReturn(true);

        $this->variable->setMasterVariant($variant);
        $this->assertSame($variant, $this->variable->getMasterVariant());
    }

    /**
     * @test
     */
    public function it_should_reset_master_variant_when_a_new_one_is_added()
    {
        $variant1 = $this->getMock('\LMammino\EFoundation\Variation\Model\VariantInterface');
        $variant1isMaster = false;
        $variant1->expects($this->atLeast(1))
                 ->method('isMaster')
                 ->will($this->returnCallback(function () use (&$variant1isMaster) {
                     return $variant1isMaster;
                 }));


        $this->variable->setMasterVariant($variant1);
        $variant1isMaster = true;

        $variant2 = $this->getMock('\LMammino\EFoundation\Variation\Model\VariantInterface');
        $variant2->expects($this->once())
                 ->method('setMaster')
                 ->with(true);
        $variant2->expects($this->once())
                 ->method('isMaster')
                 ->willReturn(true);

        $variant1->expects($this->once())
                 ->method('setMaster')
                 ->with(false);

        $this->variable->setMasterVariant($variant2);
        $variant1isMaster = false;

        $this->assertSame($variant2, $this->variable->getMasterVariant());
    }

    /**
     * @test
     */
    public function it_should_check_if_has_variants()
    {
        $variant = $this->getMock('\LMammino\EFoundation\Variation\Model\VariantInterface');
        $this->variable->addVariant($variant);

        $this->assertTrue($this->variable->hasVariants());
    }

    /**
     * @test
     */
    public function it_should_not_have_variants_by_default()
    {
        $this->assertFalse($this->variable->hasVariants());
    }

    /**
     * @test
     */
    public function it_should_add_a_variant()
    {
        $variant = $this->getMock('\LMammino\EFoundation\Variation\Model\VariantInterface');
        $this->variable->addVariant($variant);
        $this->assertContains($variant, $this->variable->getVariants());
    }

    /**
     * @test
     */
    public function it_should_remove_a_variant()
    {
        $variant = $this->getMock('\LMammino\EFoundation\Variation\Model\VariantInterface');
        $this->variable->addVariant($variant);
        $this->assertContains($variant, $this->variable->getVariants());
        $this->variable->removeVariant($variant);
        $this->assertNotContains($variant, $this->variable->getVariants());
    }

    /**
     * @test
     */
    public function it_should_check_if_has_a_given_variant()
    {
        $variant1 = $this->getMock('\LMammino\EFoundation\Variation\Model\VariantInterface');
        $variant2 = $this->getMock('\LMammino\EFoundation\Variation\Model\VariantInterface');

        $this->variable->addVariant($variant1);
        $this->assertTrue($this->variable->hasVariant($variant1));
        $this->assertFalse($this->variable->hasVariant($variant2));
    }

    /**
     * @test
     */
    public function it_should_check_if_have_variability_options()
    {
        $variabilityOption = $this->getMock('\LMammino\EFoundation\Variation\Model\OptionInterface');
        $variabilityOptions = new ArrayCollection(array($variabilityOption));
        $this->variable->setVariabilityOptions($variabilityOptions);
        $this->assertContains($variabilityOption, $this->variable->getVariabilityOptions());
    }

    /**
     * @test
     */
    public function it_should_not_have_variable_options_by_default()
    {
        $this->assertFalse($this->variable->hasVariabilityOptions());
    }

    /**
     * @test
     */
    public function it_should_add_an_variable_option()
    {
        $variabilityOption = $this->getMock('\LMammino\EFoundation\Variation\Model\OptionInterface');
        $this->variable->addVariabilityOption($variabilityOption);
        $this->assertContains($variabilityOption, $this->variable->getVariabilityOptions());
    }

    /**
     * @test
     */
    public function it_should_remove_a_variability_option()
    {
        $variabilityOption = $this->getMock('\LMammino\EFoundation\Variation\Model\OptionInterface');
        $this->variable->addVariabilityOption($variabilityOption);
        $this->assertContains($variabilityOption, $this->variable->getVariabilityOptions());
        $this->variable->removeVariabilityOption($variabilityOption);
        $this->assertNotContains($variabilityOption, $this->variable->getVariabilityOptions());
    }

}
