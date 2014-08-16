<?php

namespace LMammino\EFoundation\Tests\Common\Exception;

use LMammino\EFoundation\Common\Exception\LogicException;

/**
 * Class LogicExceptionTest
 *
 * @package LMammino\EFoundation\Tests\Common\Exception
 */
class LogicExceptionTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var LogicException $exception
     */
    private $exception;

    /**
     * {@inheritDoc}
     */
    protected function setup()
    {
        $this->exception = new LogicException();
    }

    /**
     * @test
     */
    public function it_should_implement_efoundation_exception()
    {
        $this->assertInstanceOf('\LMammino\EFoundation\Common\Exception\EFoundationException', $this->exception);
    }
}
