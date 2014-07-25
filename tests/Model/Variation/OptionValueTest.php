<?php

namespace LMammino\EFoundation\Tests\Model\Variation;

use LMammino\EFoundation\Model\Variation\OptionValue;

/**
 * Class OptionValueTest
 *
 * @package LMammino\EFoundation\Tests\Model\Variation
 */
class OptionValueTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \LMammino\EFoundation\Model\Variation\OptionValue $optionValue
     */
    private $optionValue;

    /**
     * {@inheritDoc}
     */
    protected function setup()
    {
        $this->optionValue = new OptionValue();
    }

    /**
     * @test
     */
    public function it_should_implement_option_value_interface()
    {
        $this->assertInstanceOf('\LMammino\EFoundation\Model\Variation\OptionValueInterface', $this->optionValue);
    }

    /**
     * @test
     */
    public function it_should_handle_an_option()
    {
        $option = $this->getMock('\LMammino\EFoundation\Model\Variation\OptionInterface');
        $this->optionValue->setOption($option);
        $this->assertSame($option, $this->optionValue->getOption());
    }

    /**
     * @test
     */
    public function it_should_handle_a_value()
    {
        $value = 17;
        $this->optionValue->setValue($value);
        $this->assertEquals($value, $this->optionValue->getValue());
    }

    /**
     * @test
     */
    public function it_should_get_option_name()
    {
        $name = 'size';
        $option = $this->getMock('\LMammino\EFoundation\Model\Variation\OptionInterface');
        $option->expects($this->once())
               ->method('getName')
               ->willReturn($name);

        $this->optionValue->setOption($option);
        $this->assertEquals($name, $this->optionValue->getOptionName());
    }

    /**
     * @test
     *
     * @expectedException \BadMethodCallException
     */
    public function it_should_raise_an_exception_when_getting_option_name_without_an_option()
    {
        $this->optionValue->getOptionName();
    }

    /**
     * @test
     */
    public function it_should_get_option_presentation()
    {
        $presentation = 'Size';
        $option = $this->getMock('\LMammino\EFoundation\Model\Variation\OptionInterface');
        $option->expects($this->once())
               ->method('getPresentation')
               ->willReturn($presentation);

        $this->optionValue->setOption($option);
        $this->assertEquals($presentation, $this->optionValue->getOptionPresentation());
    }

    /**
     * @test
     *
     * @expectedException \BadMethodCallException
     */
    public function it_should_raise_an_exception_when_getting_option_presentation_without_an_option()
    {
        $this->optionValue->getOptionPresentation();
    }
}
