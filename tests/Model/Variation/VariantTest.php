<?php

namespace LMammino\EFoundation\Tests\Model\Variation;
use LMammino\EFoundation\Model\Variation\Variant;

/**
 * Class VariantTest
 *
 * @package LMammino\EFoundation\Tests\Model\Variation
 */
class VariantTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \LMammino\EFoundation\Model\Variation\Variant $variant
     */
    private $variant;

    /**
     * {@inheritDoc}
     */
    protected function setup()
    {
        $this->variant = new Variant();
    }

    /**
     * @test
     */
    public function it_should_implement_variant_interface()
    {
        $this->assertInstanceOf('\LMammino\EFoundation\Model\Variation\VariantInterface', $this->variant);
    }

    /**
     * @test
     */
    public function it_should_handle_master()
    {
        $master = true;
        $this->variant->setMaster($master);
        $this->assertEquals($master, $this->variant->isMaster());
    }

    /**
     * @test
     */
    public function it_should_not_be_master_by_default()
    {
        $this->assertFalse($this->variant->isMaster());
    }

    /**
     * @test
     */
    public function it_should_handle_an_object()
    {
        $object = $this->getMock('\LMammino\EFoundation\Model\Variation\VariableInterface');
        $this->variant->setObject($object);
        $this->assertSame($object, $this->variant->getObject());
    }

    /**
     * @test
     */
    public function it_should_handle_a_presentation()
    {
        $presentation = 'Size';
        $this->variant->setPresentation($presentation);
        $this->assertEquals($presentation, $this->variant->getPresentation());
    }

    /**
     * @test
     */
    public function it_should_handle_option_values()
    {
        $optionValues = $this->getMock('\Doctrine\Common\Collections\Collection');
        $this->variant->setOptionValues($optionValues);
        $this->assertSame($optionValues, $this->variant->getOptionValues());
    }

    /**
     * @test
     */
    public function it_should_add_an_option_value()
    {
        $optionValue = $this->getMock('\LMammino\EFoundation\Model\Variation\OptionValueInterface');
        $this->variant->addOptionValue($optionValue);
        $this->assertContains($optionValue, $this->variant->getOptionValues());
    }

    /**
     * @test
     */
    public function it_should_remove_an_option_value()
    {
        $optionValue = $this->getMock('\LMammino\EFoundation\Model\Variation\OptionValueInterface');
        $this->variant->addOptionValue($optionValue);
        $this->assertContains($optionValue, $this->variant->getOptionValues());
        $this->variant->removeOptionValue($optionValue);
        $this->assertNotContains($optionValue, $this->variant->getOptionValues());
    }

    /**
     * @test
     */
    public function it_should_check_if_has_a_given_option_value()
    {
        $optionValue = $this->getMock('\LMammino\EFoundation\Model\Variation\OptionValueInterface');
        $this->assertFalse($this->variant->hasOptionValue($optionValue));
        $this->variant->addOptionValue($optionValue);
        $this->assertTrue($this->variant->hasOptionValue($optionValue));
    }

    /**
     * @test
     */
    public function it_should_inherit_defaults()
    {
        $masterVariant = $this->getMock('\LMammino\EFoundation\Model\Variation\VariantInterface');
        $masterVariant->expects($this->once())
                      ->method('isMaster')
                      ->willReturn(true);

        $this->variant->inheritDefaults($masterVariant);
    }

    /**
     * @test
     * @expectedException \InvalidArgumentException
     */
    public function it_cant_inherit_defaults_from_a_not_master_variant()
    {
        $variant = $this->getMock('\LMammino\EFoundation\Model\Variation\VariantInterface');

        $variant->expects($this->once())
                ->method('isMaster')
                ->willReturn(false);

        $this->variant->inheritDefaults($variant);
    }

    /**
     * @test
     * @expectedException \LogicException
     */
    public function it_cant_inherit_defaults_if_is_a_master_variant()
    {
        $this->variant->setMaster(true);

        $masterVariant = $this->getMock('\LMammino\EFoundation\Model\Variation\VariantInterface');
        $masterVariant->expects($this->once())
            ->method('isMaster')
            ->willReturn(true);

        $this->variant->inheritDefaults($masterVariant);
    }
}
