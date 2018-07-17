<?php
class RegexUntilsTest extends TesterCase
{
    public $skip_database_clear_before = ['all'];

    public function testGetNumbersFromString()
    {
        $numbers = RegexUntils::getNumbersFromString('12345');
        Assert::expect($numbers)->to_equal('12345');

        $numbers = RegexUntils::getNumbersFromString(' a1b2c3d4e5');
        Assert::expect($numbers)->to_equal('12345');

        $numbers = RegexUntils::getNumbersFromString('12-345 ');
        Assert::expect($numbers)->to_equal('12345');
    }
}
