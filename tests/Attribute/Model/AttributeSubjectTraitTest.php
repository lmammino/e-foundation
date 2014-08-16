<?php

namespace LMammino\EFoundation\Tests\Attribute\Model;

use LMammino\EFoundation\Tests\Dummy\Model\Attribute\DummyAttributeSubject;

/**
 * Class AttributeSubjectTraitTest
 *
 * @package LMammino\EFoundation\Tests\Attribute\Model
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
            '\LMammino\EFoundation\Attribute\Model\AttributeSubjectInterface',
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
        $attributeValue = $this->getMock('\LMammino\EFoundation\Attribute\Model\AttributeValueInterface');
        $this->attributeSubject->addAttributeValue($attributeValue);
        $this->assertContains($attributeValue, $this->attributeSubject->getAttributeValues());
    }

    /**
     * @test
     */
    public function it_should_remove_an_attribute_value()
    {
        $attributeValue = $this->getMock('\LMammino\EFoundation\Attribute\Model\AttributeValueInterface');
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
        $attributeValue = $this->getMock('\LMammino\EFoundation\Attribute\Model\AttributeValueInterface');
        $this->assertFalse($this->attributeSubject->hasAttributeValue($attributeValue));
        $this->attributeSubject->addAttributeValue($attributeValue);
        $this->assertTrue($this->attributeSubject->hasAttributeValue($attributeValue));
    }

    /**
     * @test
     */
    public function it_should_check_if_has_an_attribute_value_by_name()
    {
        $attributeValue = $this->getMock('\LMammino\EFoundation\Attribute\Model\AttributeValueInterface');
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
        $attributeValue = $this->getMock('\LMammino\EFoundation\Attribute\Model\AttributeValueInterface');
        $attributeValue->expects($this->atLeastOnce())
            ->method('getAttributeName')
            ->willReturn('foo');

        $this->attributeSubject->addAttributeValue($attributeValue);

        $this->assertSame($attributeValue, $this->attributeSubject->getAttributeValueByName('foo'));
    }
}
