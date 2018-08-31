<?php

namespace Acme;

/**
 * This is a description
 * of this class
 *
 * @package Acme
 */
abstract class ExampleClass implements \Reflector
{

    /**
     * Description of a*a
     * @param $arg
     * @param array $arr
     * @param int $bool
     */
    public function funcA($arg, array $arr, $bool = 10)
    {
    }

    /**
     * Description of c
     * @deprecated This one is deprecated
     * @param $arg
     * @param array $arr
     * @param int $bool
     * @return \Acme\ExampleClass
     */
    protected function funcC($arg, array $arr, $bool = 10)
    {
    }

    /**
     * Description of b
     *
     * @example
     * <code>
     *  <?php
     *      $lorem = 'te';
     *      $ipsum = 'dolor';
     * </code>
     *
     * @param  int   $arg
     * @param array $arr
     * @param int $bool
     */
    public function funcB($arg, array $arr, $bool = 10)
    {
    }

    public function funcD($arg, $arr = array(), ExampleInterface $depr = null, \stdClass $class)
    {
    }

    public function getFunc()
    {
    }

    public function hasFunc()
    {
    }

    abstract public function isFunc();

    /**
     * @ignore
     */
    public function someFunc()
    {
    }

    private function privFunc()
    {
    }
}

/**
 * @deprecated This one is deprecated
 *
 * Lorem te ipsum
 *
 * @package Acme
 */
class ExampleClassDepr
{
}

/**
 * Interface ExampleInterface
 * @package Acme
 * @ignore
 */
interface ExampleInterface
{

    /**
     * @param string $arg
     * @return \stdClass
     */
    public function func($arg = 'a');
}

class SomeClass
{

    /**
     * @return int
     */
    public function aMethod()
    {
    }
}

class ClassImplementingInterface extends SomeClass implements ExampleInterface
{

    /**
     * @inheritdoc
     */
    public function func($arg = 'a')
    {
    }

    /**
     * @inheritDoc
     */
    public function aMethod()
    {
    }

    /**
     * @return \FilesystemIterator
     */
    public function methodReturnNativeClass()
    {
    }

    /**
     * @return \FilesystemIterator[]
     */
    public function methodReturningArrayNativeClass()
    {
    }
}

class ClassWithStaticFunc
{

    /**
     * @return float
     */
    public static function somStaticFunc()
    {
    }
}

use PHPDocsMD\Console\CLI;

interface InterfaceReferringToImportedClass
{

    /**
     * @return CLI
     */
    public function theFunc();

    /**
     * @return CLI[]
     */
    public function funcReturningArr();
}
