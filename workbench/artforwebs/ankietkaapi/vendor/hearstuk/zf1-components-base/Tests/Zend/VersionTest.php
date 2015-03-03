<?php
namespace Tests\Zend;

class VersionTest extends \Tests\TestCase
{
    /**
     * Ensure that the composer autoloader is finding the class correctly.
     * Also checks that we are at version 1.12.3.
     */
    public function testCanLoadZendVersion()
    {
        $this->assertSame('1.12.3', \Zend_Version::VERSION);
    }
}