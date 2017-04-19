<?php

use Stringy\Stringy as S;

class SubstringTest extends \PHPUnit\Framework\TestCase
{
    /**
     * Asserts that a variable is of a SubStringy instance.
     *
     * @param mixed $actual
     */
    public function assertSubStringy($actual)
    {
        $this->assertInstanceOf('SubStringy\SubStringy', $actual);
    }

    public function substringAfterFirstProvider()
    {
        return array(
            array(' now', 'find me now', 'me', 'UTF-8'),
            array(' now, me is also here', 'find me now, me is also here', 'me', 'UTF-8'),
        );
    }

    public function substringAfterLastProvider()
    {
        return array(
            array(' now', 'find me now', 'me', 'UTF-8'),
            array(' is also here', 'find me now, me is also here', 'me', 'UTF-8'),
        );
    }

    public function substringBeforeFirstProvider()
    {
        return array(
            array('find ', 'find me now', 'me', 'UTF-8'),
            array('find ', 'find me now, me is also here', 'me', 'UTF-8'),
        );
    }

    public function substringBeforeLastProvider()
    {
        return array(
            array('find ', 'find me now', 'me', 'UTF-8'),
            array('find me now, ', 'find me now, me is also here', 'me', 'UTF-8'),
        );
    }

    public function substringBetweenProvider()
    {
        return array(
            array(' nice ', 'hello this is a nice string', 'a', 'string', 'UTF-8'),
        );
    }

    public function substringCountProvider()
    {
        return array(
            array(2, 'hello how are you? are you ok?', '?', 'UTF-8'),
            array(1, 'hello how are you? are you ok?', 'hello', 'UTF-8'),
        );
    }


    /**
     * @dataProvider substringAfterFirstProvider()
     */
    public function testSubstringAfterFirst($expected, $str, $separator, $encoding = null)
    {
        $result = S::create($str, $encoding)->substringAfterFirst($separator);
        $this->assertInternalType('string', (string)$result);
        $this->assertEquals($expected, $result);
    }

    /**
     * @dataProvider substringAfterLastProvider()
     */
    public function testSubstringAfterLast($expected, $str, $separator, $encoding = null)
    {
        $result = S::create($str, $encoding)->substringAfterLast($separator);
        $this->assertInternalType('string', (string)$result);
        $this->assertEquals($expected, $result);
    }

    /**
     * @dataProvider substringBeforeFirstProvider()
     */
    public function testSubstringBeforeFirst($expected, $str, $separator, $encoding = null)
    {
        $result = S::create($str, $encoding)->substringBeforeFirst($separator);
        $this->assertInternalType('string', (string)$result);
        $this->assertEquals($expected, $result);
    }

    /**
     * @dataProvider substringBeforeLastProvider()
     */
    public function testSubstringBeforeLast($expected, $str, $separator, $encoding = null)
    {
        $result = S::create($str, $encoding)->substringBeforeLast($separator);
        $this->assertInternalType('string', (string)$result);
        $this->assertEquals($expected, $result);
    }

    /**
     * @dataProvider substringBetweenProvider()
     */
    public function testSubstringBetween($expected, $str, $start, $end, $encoding = null)
    {
        $result = S::create($str, $encoding)->substringBetween($start, $end);
        $this->assertInternalType('string', (string)$result);
        $this->assertEquals($expected, $result);
    }

    /**
     * @dataProvider substringCountProvider()
     */
    public function testSubstringCount($expected, $str, $substr, $encoding = null)
    {
        $result = S::create($str, $encoding)->substringCount($substr);
        $this->assertInternalType('int', $result);
        $this->assertEquals($expected, $result);
    }

}