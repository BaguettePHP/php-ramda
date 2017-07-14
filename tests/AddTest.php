<?php

namespace Baguette\Ramda;

/**
 * Test for Ramda()
 *
 * @author     USAMI Kenta <tadsan@zonu.me>
 * @copyright  2017 Baguette HQ
 * @license    http://www.apache.org/licenses/LICENSE-2.0 Apache-2.0
 */
class AddTest extends \PHPUnit_Framework_TestCase
{
    public function test0()
    {
        $actual = add();

        $this->assertInstanceOf(\Closure::class, $actual);
        $this->assertEquals(2, util\arity($actual));
    }

    public function test1()
    {
        $actual = add(1);

        $this->assertInstanceOf(\Closure::class, $actual);
        $this->assertEquals(1, util\arity($actual));
    }

    public function test2()
    {
        $actual = add(1, 2);

        $this->assertNotInstanceOf(\Closure::class, $actual);
        $this->assertEquals(3, $actual);
    }
}
