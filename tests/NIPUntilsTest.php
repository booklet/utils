<?php
class NIPUntilsTest extends TesterCase
{
    public function testIsNumberBetween()
    {
        $is = NIPUntils::checkNIP('106-00-00-062');
        Assert::expect($is)->to_equal(true);

        $is = NIPUntils::checkNIP('109-21-18-884');
        Assert::expect($is)->to_equal(true);

        $is = NIPUntils::checkNIP('5314803106');
        Assert::expect($is)->to_equal(true);

        $is = NIPUntils::checkNIP('1196609029');
        Assert::expect($is)->to_equal(true);

        $is = NIPUntils::checkNIP('1196609021');
        Assert::expect($is)->to_equal(false);



    }
}
