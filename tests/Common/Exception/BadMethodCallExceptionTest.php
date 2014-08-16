<?php


namespace LMammino\EFoundation\Tests\Common\Exception;

use LMammino\EFoundation\Common\Exception\BadMethodCallException;

/**
 * Class BadMethodCallExceptionTest
 *
 * @package LMammino\EFoundation\Tests\Common\Exception
 */
class BadMethodCallExceptionTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var BadMethodCallException $exception
     */
    private $exception;

    /**
     * {@inheritDoc}
     */
    protected function setup()
    {
        $this->exception = new BadMethodCallException();
    }

    /**
     * @test
     */
    public function it_should_implement_efoundation_exception()
    {
        $this->assertInstanceOf('\LMammino\EFoundation\Common\Exception\EFoundationException', $this->exception);
    }
}
