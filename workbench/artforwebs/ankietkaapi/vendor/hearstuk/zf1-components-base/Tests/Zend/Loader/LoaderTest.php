<?php
namespace Tests\Zend\Loader;

class LoaderTest extends \Tests\TestCase
{

    protected $loaderClasses = array(
        '\Zend_Loader',
        '\Zend_Loader_Autoloader',
        '\Zend_Loader_Autoloader_Interface',
        '\Zend_Loader_Autoloader_Resource',
        '\Zend_Loader_Exception',
        '\Zend_Loader_Exception_InvalidArgumentException',
        '\Zend_Loader_PluginLoader',
        '\Zend_Loader_PluginLoader_Exception',
        '\Zend_Loader_PluginLoader_Interface',
        '\Zend_Loader_AutoloaderFactory',
        '\Zend_Loader_ClassMapAutoloader',
        '\Zend_Loader_SplAutoloader',
        '\Zend_Loader_StandardAutoloader'
    );

    /**
     * Ensure that the composer autoloader is finding the class correctly.
     */
    public function testCanFindLoaderClasses()
    {
        foreach ($this->loaderClasses as $class) {
            $this->assertTrue(class_exists($class) || interface_exists($class));
        }
    }

    /**
     * Ensure that the modification to \Zend_Loader::loadClass() works through composer.
     */
    public function testCanLoadClassWithZendLoader()
    {
        $GLOBALS['Tests_Zend_Loader_Fixtures_LoadableClass_Loaded'] = false;
        \Zend_Loader::loadClass('\Tests\Zend\Loader\Fixtures\LoadableClass');
        $this->assertTrue($GLOBALS['Tests_Zend_Loader_Fixtures_LoadableClass_Loaded']);
    }
}