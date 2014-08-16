<?php

namespace LMammino\EFoundation\Tests\Common\Exception;

use LMammino\EFoundation\Common\Exception\InvalidArgumentException;

/**
 * Class InvalidArgumentExceptionTest
 *
 * @package LMammino\EFoundation\Tests\Common\Exception
 */
class InvalidArgumentExceptionTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var InvalidArgumentException $exception
     */
    private $exception;

    /**
     * {@inheritDoc}
     */
    protected function setup()
    {
        $this->exception = new InvalidArgumentException();
    }

    /**
     * @test
     */
    public function it_should_implement_efoundation_exception()
    {
        $this->assertInstanceOf('\LMammino\EFoundation\Common\Exception\EFoundationException', $this->exception);
    }
}
