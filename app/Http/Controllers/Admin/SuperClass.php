<?php


namespace App\Http\Controllers\Admin;

use phpDocumentor\Reflection\Types\String_;

/**
 * @method int foo(string $x)
 *
 */

class SuperClass
{
    public function __call(string $name, array $arguments)
    {

        // TODO: Implement __call() method.
    }

    public static function __callStatic(string $name, array $arguments)
    {
        // TODO: Implement __callStatic() method.
    }
}
