<?php

namespace LMammino\EFoundation\Tests\Variation\Model;

use LMammino\EFoundation\Variation\Model\OptionValue;

/**
 * Class OptionValueTest
 *
 * @package LMammino\EFoundation\Tests\Variation\Model
 */
class OptionValueTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \LMammino\EFoundation\Variation\Model\OptionValue $optionValue
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
        $this->assertInstanceOf('\LMammino\EFoundation\Variation\Model\OptionValueInterface', $this->optionValue);
    }

    /**
     * @test
     */
    public function it_should_handle_an_option()
    {
        $option = $this->getMock('\LMammino\EFoundation\Variation\Model\OptionInterface');
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
        $option = $this->getMock('\LMammino\EFoundation\Variation\Model\OptionInterface');
        $option->expects($this->once())
               ->method('getName')
               ->willReturn($name);

        $this->optionValue->setOption($option);
        $this->assertEquals($name, $this->optionValue->getOptionName());
    }

    /**
     * @test
     *
     * @expectedException \LMammino\EFoundation\Common\Exception\BadMethodCallException
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
        $option = $this->getMock('\LMammino\EFoundation\Variation\Model\OptionInterface');
        $option->expects($this->once())
               ->method('getPresentation')
               ->willReturn($presentation);

        $this->optionValue->setOption($option);
        $this->assertEquals($presentation, $this->optionValue->getOptionPresentation());
    }

    /**
     * @test
     *
     * @expectedException \LMammino\EFoundation\Common\Exception\BadMethodCallException
     */
    public function it_should_raise_an_exception_when_getting_option_presentation_without_an_option()
    {
        $this->optionValue->getOptionPresentation();
    }
}
