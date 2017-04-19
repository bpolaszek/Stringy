<?php

use Stringy\Stringy as S;

class JoinTest extends \PHPUnit\Framework\TestCase
{

    public function testJoinMultipleStringiesWithGlue()
    {
        $str = 'foo/bar/baz';
        $segments = S::create($str)->split('/');
        $newStr = S::join($segments, '\\');
        $this->assertEquals('foo\\bar\\baz', (string) $newStr);
    }

    public function testJoinMultipleStringiesWithoutGlue()
    {
        $str = 'foo/bar/baz';
        $segments = S::create($str)->split('/');
        $newStr = S::join($segments);
        $this->assertEquals('foobarbaz', (string) $newStr);
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testJoinMultipleStringiesShouldFailOnEmptyArray()
    {
        S::join([]);
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testJoinMultipleStringiesShouldFailOnInvalidArray()
    {
        S::join([S::create(), 'foo', S::create()]);
    }

}