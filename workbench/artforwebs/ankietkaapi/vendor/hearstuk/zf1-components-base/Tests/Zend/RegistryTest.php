<?php
namespace Tests\Zend;

class RegistryTest extends \Tests\TestCase
{
    /**
     * Ensure that the composer autoloader is finding the class correctly.
     */
    public function testCanLoadZendRegistry()
    {
        \Zend_Registry::set('foo', 'bar');
        $this->assertSame('bar', \Zend_Registry::get('foo'));
    }
}