<?php

/**
 * Ramda!
 *
 * @author     USAMI Kenta <tadsan@zonu.me>
 * @copyright  2017 Baguette HQ
 * @license    http://www.apache.org/licenses/LICENSE-2.0 Apache-2.0
 */
namespace Baguette\Ramda
{
    /**
     * Number → Number → Number
     *
     * @param  int|float $a
     * @param  int|float $b
     * @return int|float|\Closure
     */
    function add($a = null, $b = null)
    {
        return util\curry2(function ($a, $b) {
            return $a + $b;
        }, func_get_args());
    }

    /**
     * Functor f => (a → b) → f a → f b
     *
     * @param  callable
     */
    function map($f = null, $a = null)
    {
        return util\curry2(function (callable $f, $a) {
            $b = [];
            foreach ($a as $i => $d) {
                $b[$i] = $f($d);
            }

            return $b;
        }, func_get_args());
    }
}

namespace Baguette\Ramda\util
{
    /**
     * Returns an indication of the number of arguments accepted by a callable.
     *
     * @param  callable $callback
     * @return int
     */
    function arity (callable $callback)
    {
        if (is_array($callback) ||
            (is_string($callback) && strpos($callback, '::') !== false)) {
            list($class, $method) = is_string($callback) ? explode('::', $callback) : $callback;
            $reflection = (new \ReflectionClass($class))->getMethod($method);
        } elseif (is_object($callback) && !($callback instanceof \Closure)) {
            $reflection = (new \ReflectionClass($callback))->getMethod('__invoke');
        } else {
            $reflection = new \ReflectionFunction($callback);
        }

        return $reflection->getNumberOfParameters();
    }

    function curry1(\Closure $f, array $args)
    {
        switch (count($args)) {
        case 0:
            return $f;
        default:
            return $f($args[0]);
        }
    }

    function curry2(\Closure $f, array $args)
    {
        switch (count($args)) {
        case 0:
            return $f;
        case 1:
            return function ($a) use ($f) {
                return $f($args[0], $a);
            };
        default:
            return $f($args[0], $args[1]);
        }
    }
}
