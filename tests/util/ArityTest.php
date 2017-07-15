<?php

namespace Baguette\Ramda\util;

use Baguette\Ramda\NarityFunc;

/**
 * Test for Ramda()
 *
 * @author     USAMI Kenta <tadsan@zonu.me>
 * @copyright  2017 Baguette HQ
 * @license    http://www.apache.org/licenses/LICENSE-2.0 Apache-2.0
 */
class ArityTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider dataProviderFor_test
     */
    public function test($expected, $input)
    {
        $this->assertEquals($expected, arity($input));
    }

    public function dataProviderFor_test()
    {
        yield [1, 'end'];
        yield [2, 'count'];
        yield [3, 'is_callable'];
        yield [1, __NAMESPACE__ . '\\arity'];
        yield [0, function() {}];
        yield [1, function($a) {}];
        yield [2, function($a, $b) {}];
        yield [3, function($a, $b, $c) {}];
        yield [1, new NarityFunc(1, function() {})];
        yield [2, new NarityFunc(2, function() {})];
        yield [3, new NarityFunc(3, function() {})];
    }
}
