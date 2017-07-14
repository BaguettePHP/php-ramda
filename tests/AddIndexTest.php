<?php

namespace Baguette\Ramda;

class AddTest extends \PHPUnit_Framework_TestCase
{
    public function test0()
    {
        $actual = addIndex();

        $this->assertInstanceOf(\Closure::class, $actual);
        $this->assertEquals(2, util\arity($actual));
    }

    public function test1()
    {
        $actual = add(1);

        $this->assertInstanceOf(\Closure::class, $actual);
        $this->assertEquals(1, util\arity($actual));
    }

    public function test()
    {
        $expected = ['0-f', '1-o', '2-o', '3-b', '4-a', '5-r'];

        $map_indexed = addIndex(map());
        $map_indexed(function($val, $idx) {
            return $idx . '-' . $val;
        }, ['f', 'o', 'o', 'b', 'a', 'r']);

        $actual = add(1, 2);

        $this->assertNotInstanceOf(\Closure::class, $actual);
        $this->assertEquals(3, $actual);
    }
}