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
    public function it_should_handle_a_name()
    {
        $name = 'size';
        $this->optionValue->setName($name);
        $this->assertEquals($name, $this->optionValue->getName());
    }

    /**
     * @test
     */
    public function it_should_handle_a_presentation()
    {
        $presentation = 'size';
        $this->optionValue->setPresentation($presentation);
        $this->assertEquals($presentation, $this->optionValue->getPresentation());
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

}
