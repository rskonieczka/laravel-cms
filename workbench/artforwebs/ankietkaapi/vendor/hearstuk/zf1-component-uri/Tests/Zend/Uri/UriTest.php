<?php
namespace Tests\Zend\Uri;

class UriTest extends \Tests\TestCase
{
    protected $classes = array(
        '\Zend_Uri',
        '\Zend_Uri_Exception',
        '\Zend_Uri_Http'
    );

    /**
     * Ensure that the composer autoloader is finding the classes correctly.
     */
    public function testCanFindClasses()
    {
        foreach ($this->classes as $class) {
            $this->assertTrue(class_exists($class) || interface_exists($class));
        }
    }

    public function testCanLoadHttpClass()
    {
        $uriHttp = \Zend_Uri::factory('http://example.com');
        $this->assertInstanceof('\Zend_Uri_Http', $uriHttp);
    }
}