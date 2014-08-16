<?php

namespace LMammino\EFoundation\Tests\Model\Attribute;

use LMammino\EFoundation\Model\Attribute\Attribute;

/**
 * Class AttributeTest
 *
 * @package LMammino\EFoundation\Tests\Model\Attribute
 */
class AttributeTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \LMammino\EFoundation\Model\Attribute\Attribute $attribute
     */
    private $attribute;

    /**
     * {@inheritDoc}
     */
    protected function setup()
    {
        $this->attribute = new Attribute();
    }

    /**
     * @test
     */
    public function it_should_implement_attribute_interface()
    {
        $this->assertInstanceOf('\LMammino\EFoundation\Model\Attribute\AttributeInterface', $this->attribute);
    }

    /**
     * @test
     */
    public function it_should_handle_a_name()
    {
        $name = 'material';
        $this->attribute->setName($name);
        $this->assertEquals($name, $this->attribute->getName());
    }

    /**
     * @test
     */
    public function it_should_handle_a_presentation()
    {
        $presentation = 'Material';
        $this->attribute->setPresentation($presentation);
        $this->assertEquals($presentation, $this->attribute->getPresentation());
    }

    /**
     * @test
     */
    public function it_should_handle_a_configuration()
    {
        $configuration = array('foo' => 'bar');
        $this->attribute->setConfiguration($configuration);
        $this->assertEquals($configuration, $this->attribute->getConfiguration());
    }

    /**
     * @test
     */
    public function it_should_have_an_empty_array_as_default_configuration()
    {
        $this->assertInternalType('array', $this->attribute->getConfiguration());
        $this->assertEmpty($this->attribute->getConfiguration());
    }
}
