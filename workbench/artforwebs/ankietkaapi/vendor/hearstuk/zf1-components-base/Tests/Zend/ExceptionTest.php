<?php
namespace Tests\Zend;

class ExceptionTest extends \Tests\TestCase
{
    /**
     * Ensure that the composer autoloader is finding the class correctly.
     */
    public function testCanLoadZendException()
    {
        $exception = new \Zend_Exception("Testing");
        $this->assertInstanceOf('\Zend_Exception', $exception);
        $this->assertInstanceOf('\Exception', $exception);
    }
}