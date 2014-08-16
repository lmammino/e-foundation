<?php

namespace LMammino\EFoundation\Tests\Variation\Model;
use Doctrine\Common\Collections\ArrayCollection;
use LMammino\EFoundation\Variation\Model\Option;

/**
 * Class OptionTest
 *
 * @package LMammino\EFoundation\Tests\Variation\Model
 */
class OptionTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \LMammino\EFoundation\Variation\Model\Option $option
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
        $this->assertInstanceOf('\LMammino\EFoundation\Variation\Model\OptionInterface', $this->option);
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
        $value = $this->getMock('\LMammino\EFoundation\Variation\Model\OptionValueInterface');
        $value->expects($this->once())
              ->method('setOption')
              ->with($this->option);
        $values = new ArrayCollection(array($value));
        $this->option->setValues($values);
        $this->assertContains($value, $this->option->getValues());
    }

    /**
     * @test
     */
    public function it_should_add_a_value()
    {
        $value = $this->getMock('\LMammino\EFoundation\Variation\Model\OptionValueInterface');
        $this->option->addValue($value);
        $this->assertContains($value, $this->option->getValues());
    }

    /**
     * @test
     */
    public function it_should_remove_a_value()
    {
        $value = $this->getMock('\LMammino\EFoundation\Variation\Model\OptionValueInterface');
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
        $value = $this->getMock('\LMammino\EFoundation\Variation\Model\OptionValueInterface');
        $this->assertFalse($this->option->hasValue($value));
        $this->option->addValue($value);
        $this->assertTrue($this->option->hasValue($value));
    }
}
