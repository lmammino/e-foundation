<?php

namespace LMammino\EFoundation\Tests\Product\Model;
use LMammino\EFoundation\Product\Model\Option;

/**
 * Class OptionTest
 *
 * @package LMammino\EFoundation\Tests\Product\Model
 */
class OptionTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Option $option
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
        $this->assertInstanceOf('\LMammino\EFoundation\Product\Model\OptionInterface', $this->option);
    }
}
