<?php

namespace Baguette\Ramda;

/**
 * Response N arity function wrapper
 *
 * @author     USAMI Kenta <tadsan@zonu.me>
 * @copyright  2017 Baguette HQ
 * @license    http://www.apache.org/licenses/LICENSE-2.0 Apache-2.0
 *
 * @property-read int      $arity
 * @property-read callable $callback
 */
final class NarityFunc
{
    /** @var int */
    private $arity;
    /** @var callable */
    private $callback;

    /**
     * @param int      $arity
     * @param callable $callback
     */
    public function __construct($arity, callable $callback)
    {
        $this->arity = $arity;
        $this->callback = $callback;
    }

    public function __get($name)
    {
        return $this->$name;
    }

    public function __invoke()
    {
        return call_user_func_array($this->callback, func_get_args());
    }
}
