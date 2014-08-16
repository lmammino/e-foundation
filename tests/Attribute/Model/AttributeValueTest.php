<?php

namespace LMammino\EFoundation\Tests\Attribute\Model;

use LMammino\EFoundation\Attribute\Model\AttributeValue;

class AttributeValueTest extends \PHPUnit_Framework_TestCase {

    /**
     * @var AttributeValue $attributeValue
     */
    private $attributeValue;

    /**
     * {@inheritDoc}
     */
    protected function setup()
    {
        $this->attributeValue = new AttributeValue();
    }

    /**
     * @test
     */
    public function it_should_implement_attribute_value_interface()
    {
        $this->assertInstanceOf('\LMammino\EFoundation\Attribute\Model\AttributeValueInterface', $this->attributeValue);
    }

    /**
     * @test
     */
    public function it_should_handle_a_subject()
    {
        $subject = $this->getMock('\LMammino\EFoundation\Attribute\Model\AttributeSubjectInterface');
        $this->attributeValue->setSubject($subject);
        $this->assertSame($subject, $this->attributeValue->getSubject());
    }

    /**
     * @test
     */
    public function it_should_handle_an_attribute()
    {
        $attribute = $this->getMock('\LMammino\EFoundation\Attribute\Model\AttributeInterface');
        $this->attributeValue->setAttribute($attribute);
        $this->assertSame($attribute, $this->attributeValue->getAttribute());
    }

    /**
     * @test
     */
    public function it_should_handle_a_value()
    {
        $value = 17;
        $this->attributeValue->setValue($value);
        $this->assertEquals($value, $this->attributeValue->getValue());
    }

    /**
     * @test
     */
    public function it_should_get_attribute_name()
    {
        $attribute = $this->getMock('\LMammino\EFoundation\Attribute\Model\AttributeInterface');
        $attribute->expects($this->once())
            ->method('getName');
        $this->attributeValue->setAttribute($attribute);
        $this->attributeValue->getAttributeName();
    }

    /**
     * @test
     * @expectedException \BadMethodCallException
     */
    public function it_should_fail_to_retrieve_attribute_name_when_no_attribute_is_set()
    {
        $this->attributeValue->getAttributeName();
    }

    /**
     * @test
     */
    public function it_should_get_attribute_presentation()
    {
        $attribute = $this->getMock('\LMammino\EFoundation\Attribute\Model\AttributeInterface');
        $attribute->expects($this->once())
                  ->method('getPresentation');
        $this->attributeValue->setAttribute($attribute);
        $this->attributeValue->getAttributePresentation();
    }

    /**
     * @test
     * @expectedException \BadMethodCallException
     */
    public function it_should_fail_to_retrieve_attribute_presentation_when_no_attribute_is_set()
    {
        $this->attributeValue->getAttributePresentation();
    }

    /**
     * @test
     */
    public function it_should_get_attribute_type()
    {
        $attribute = $this->getMock('\LMammino\EFoundation\Attribute\Model\AttributeInterface');
        $attribute->expects($this->once())
            ->method('getType');
        $this->attributeValue->setAttribute($attribute);
        $this->attributeValue->getAttributeType();
    }

    /**
     * @test
     * @expectedException \BadMethodCallException
     */
    public function it_should_fail_to_retrieve_attribute_type_when_no_attribute_is_set()
    {
        $this->attributeValue->getAttributeType();
    }

    /**
     * @test
     */
    public function it_should_get_attribute_configuration()
    {
        $attribute = $this->getMock('\LMammino\EFoundation\Attribute\Model\AttributeInterface');
        $attribute->expects($this->once())
            ->method('getConfiguration');
        $this->attributeValue->setAttribute($attribute);
        $this->attributeValue->getAttributeConfiguration();
    }

    /**
     * @test
     * @expectedException \BadMethodCallException
     */
    public function it_should_fail_to_retrieve_attribute_configuration_when_no_attribute_is_set()
    {
        $this->attributeValue->getAttributeConfiguration();
    }
}
