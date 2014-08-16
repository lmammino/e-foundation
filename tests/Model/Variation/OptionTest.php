<?php

namespace LMammino\EFoundation\Tests\Model\Variation;
use LMammino\EFoundation\Model\Variation\Option;

/**
 * Class OptionTest
 *
 * @package LMammino\EFoundation\Tests\Model\Variation
 */
class OptionTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \LMammino\EFoundation\Model\Variation\Option $option
     */
    private $option;

    /**
     * {@inheritDoc}
     */
    protected function setup()
    {
        $this->option = new Option();
    }

    /**
     * @test
     */
    public function it_should_implement_option_interface()
    {
        $this->assertInstanceOf('\LMammino\EFoundation\Model\Variation\OptionInterface', $this->option);
    }

    /**
     * @test
     */
    public function it_should_handle_a_name()
    {
        $name = 'size';
        $this->option->setName($name);
        $this->assertEquals($name, $this->option->getName());
    }

    /**
     * @test
     */
    public function it_should_handle_a_presentation()
    {
        $presentation = 'Size';
        $this->option->setPresentation($presentation);
        $this->assertEquals($presentation, $this->option->getPresentation());
    }

    /**
     * @test
     */
    public function it_should_handle_values()
    {
        $values = $this->getMock('\Doctrine\Common\Collections\Collection');
        $this->option->setValues($values);
        $this->assertSame($values, $this->option->getValues());
    }

    /**
     * @test
     */
    public function it_should_add_a_value()
    {
        $value = $this->getMock('\LMammino\EFoundation\Model\Variation\OptionValueInterface');
        $this->option->addValue($value);
        $this->assertContains($value, $this->option->getValues());
    }

    /**
     * @test
     */
    public function it_should_remove_a_value()
    {
        $value = $this->getMock('\LMammino\EFoundation\Model\Variation\OptionValueInterface');
        $this->option->addValue($value);
        $this->assertContains($value, $this->option->getValues());
        $this->option->removeValue($value);
        $this->assertNotContains($value, $this->option->getValues());
    }

    /**
     * @test
     */
    public function it_should_check_if_has_a_given_value()
    {
        $value = $this->getMock('\LMammino\EFoundation\Model\Variation\OptionValueInterface');
        $this->assertFalse($this->option->hasValue($value));
        $this->option->addValue($value);
        $this->assertTrue($this->option->hasValue($value));
    }
}
