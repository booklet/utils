<?php
class RegexUntilsTest extends \CustomPHPUnitTestCase
{
    public function testGetNumbersFromString()
    {
        $numbers = RegexUntils::getNumbersFromString('12345');
        $this->assertEquals($numbers, '12345');

        $numbers = RegexUntils::getNumbersFromString(' a1b2c3d4e5');
        $this->assertEquals($numbers, '12345');

        $numbers = RegexUntils::getNumbersFromString('12-345 ');
        $this->assertEquals($numbers, '12345');
    }
}
