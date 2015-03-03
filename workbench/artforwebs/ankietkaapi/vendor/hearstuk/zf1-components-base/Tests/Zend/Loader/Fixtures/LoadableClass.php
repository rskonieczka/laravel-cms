<?php
namespace Tests\Zend\Loader\Fixtures;

/**
 * Class LoadableClass
 * @package Tests\Zend\Loader\Fixtures
 *
 * This class is loadable through composer because we have defined a PSR autoloader for Tests\Zend.
 * Zend_Loader::loadClass() would never find this on it's own.
 * But with out modifications to Zend_Loader::loadClass(), it should be able to find this class thanks to composer.
 */
class LoadableClass
{

}

$GLOBALS['Tests_Zend_Loader_Fixtures_LoadableClass_Loaded'] = true;