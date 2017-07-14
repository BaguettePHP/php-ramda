<?php

namespace Baguette\Ramda;

/**
 * Test for Ramda\map()
 *
 * @author     USAMI Kenta <tadsan@zonu.me>
 * @copyright  2017 USAMI Kenta
 * @license    http://www.apache.org/licenses/LICENSE-2.0 Apache-2.0
 */
class MapTest extends \PHPUnit_Framework_TestCase
{
    public function test0()
    {
        $actual = map();

        $this->assertInstanceOf(\Closure::class, $actual);
        $this->assertEquals(2, util\arity($actual));
    }

    public function test1()
    {
        $actual = map(1);

        $this->assertInstanceOf(\Closure::class, $actual);
        $this->assertEquals(1, util\arity($actual));
    }

    /**
     * @dataProvider dataProviderFor_test2
     */
    public function test2(callable $f, $input, $expected)
    {
        $actual = map($f, $input);

        $this->assertEquals($expected, $actual);
    }

    public function dataProviderFor_test2()
    {
        $double = function ($n) { return $n * 2; };

        return [
            [$double, [1, 2, 3], [2, 4, 6]],
            [$double, ['x' => 1, 'y' =>  2], ['x' => 2, 'y' => 4]],
        ];
    }
}
