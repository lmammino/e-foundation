<?php

namespace LMammino\EFoundation\Tests\Variation\Model;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * Class OptionSubjectTraitTest
 *
 * @package LMammino\EFoundation\Tests\Variation\Model
 */
class OptionSubjectTraitTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var DummyOptionSubject $optionSubject
     */
    private $optionSubject;

    /**
     * {@inheritDoc}
     */
    protected function setup()
    {
        $this->optionSubject = new DummyOptionSubject();
    }

    /**
     * @test
     */
    public function it_should_handle_options()
    {
        $option = $this->getMock('\LMammino\EFoundation\Variation\Model\OptionInterface');
        $options = new ArrayCollection(array($option));
        $this->optionSubject->setOptions($options);
        $this->assertContains($option, $this->optionSubject->getOptions());
    }

    /**
     * @test
     */
    public function it_should_check_if_has_an_option()
    {
        $option = $this->getMock('\LMammino\EFoundation\Variation\Model\OptionInterface');
        $this->assertFalse($this->optionSubject->hasOption($option));
        $this->optionSubject->addOption($option);
        $this->assertTrue($this->optionSubject->hasOption($option));
    }

    /**
     * @test
     */
    public function it_should_add_an_option()
    {
        $option = $this->getMock('\LMammino\EFoundation\Variation\Model\OptionInterface');
        $this->optionSubject->addOption($option);
        $this->assertContains($option, $this->optionSubject->getOptions());
    }

    /**
     * @test
     */
    public function it_should_remove_an_option()
    {
        $option = $this->getMock('\LMammino\EFoundation\Variation\Model\OptionInterface');
        $this->optionSubject->addOption($option);
        $this->assertContains($option, $this->optionSubject->getOptions());
        $this->optionSubject->removeOption($option);
        $this->assertNotContains($option, $this->optionSubject->getOptions());
    }
}
