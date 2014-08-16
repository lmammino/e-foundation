<?php

namespace LMammino\EFoundation\Tests\Model\Attribute;

use LMammino\EFoundation\Tests\Dummy\Model\Attribute\DummyAttributeSubject;

/**
 * Class AttributeSubjectTraitTest
 *
 * @package LMammino\EFoundation\Tests\Model\Attribute
 */
class AttributeSubjectTraitTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var DummyAttributeSubject $attributeSubject
     */
    private $attributeSubject;

    /**
     * {@inheritDoc}
     */
    protected function setup()
    {
        $this->attributeSubject = new DummyAttributeSubject();
    }

    /**
     * @test
     */
    public function it_should_implements_attribute_subject_interface()
    {
        $this->assertInstanceOf(
            '\LMammino\EFoundation\Model\Attribute\AttributeSubjectInterface',
            $this->attributeSubject
        );
    }

    /**
     * @test
     */
    public function it_should_handle_attribute_values()
    {
        $attributeValues = $this->getMock('\Doctrine\Common\Collections\Collection');
        $this->attributeSubject->setAttributesValues($attributeValues);
        $this->assertSame($attributeValues, $this->attributeSubject->getAttributeValues());
    }

    /**
     * @test
     */
    public function it_should_add_an_attribute_value()
    {
        $attributeValue = $this->getMock('\LMammino\EFoundation\Model\Attribute\AttributeValueInterface');
        $this->attributeSubject->addAttributeValue($attributeValue);
        $this->assertContains($attributeValue, $this->attributeSubject->getAttributeValues());
    }

    /**
     * @test
     */
    public function it_should_remove_an_attribute_value()
    {
        $attributeValue = $this->getMock('\LMammino\EFoundation\Model\Attribute\AttributeValueInterface');
        $this->attributeSubject->addAttributeValue($attributeValue);
        $this->assertContains($attributeValue, $this->attributeSubject->getAttributeValues());
        $this->attributeSubject->removeAttributeValue($attributeValue);
        $this->assertNotContains($attributeValue, $this->attributeSubject->getAttributeValues());
    }

    /**
     * @test
     */
    public function it_should_check_if_has_an_attribute_value()
    {
        $attributeValue = $this->getMock('\LMammino\EFoundation\Model\Attribute\AttributeValueInterface');
        $this->assertFalse($this->attributeSubject->hasAttributeValue($attributeValue));
        $this->attributeSubject->addAttributeValue($attributeValue);
        $this->assertTrue($this->attributeSubject->hasAttributeValue($attributeValue));
    }

    /**
     * @test
     */
    public function it_should_check_if_has_an_attribute_value_by_name()
    {
        $attributeValue = $this->getMock('\LMammino\EFoundation\Model\Attribute\AttributeValueInterface');
        $attributeValue->expects($this->atLeastOnce())
                       ->method('getAttributeName')
                       ->willReturn('foo');

        $this->attributeSubject->addAttributeValue($attributeValue);

        $this->assertTrue($this->attributeSubject->hasAttributeValueByName('foo'));
        $this->assertFalse($this->attributeSubject->hasAttributeValueByName('bar'));
    }

    /**
     * @test
     */
    public function it_should_get_an_attribute_value_by_name()
    {
        $attributeValue = $this->getMock('\LMammino\EFoundation\Model\Attribute\AttributeValueInterface');
        $attributeValue->expects($this->atLeastOnce())
            ->method('getAttributeName')
            ->willReturn('foo');

        $this->attributeSubject->addAttributeValue($attributeValue);

        $this->assertSame($attributeValue, $this->attributeSubject->getAttributeValueByName('foo'));
    }
}
