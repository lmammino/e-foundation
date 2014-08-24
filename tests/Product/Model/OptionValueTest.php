<?php

namespace LMammino\EFoundation\Tests\Product\Model;

use LMammino\EFoundation\Product\Model\OptionValue;

/**
 * Class OptionValueTest
 *
 * @package LMammino\EFoundation\Tests\Product\Model
 */
class OptionValueTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var OptionValue $optionValue
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
        $this->assertInstanceOf('\LMammino\EFoundation\Product\Model\OptionValueInterface', $this->optionValue);
    }
}
