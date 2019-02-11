<?php
class NIPUntilsTest extends \CustomPHPUnitTestCase
{
    public function testIsNumberBetween()
    {
        $is = NIPUntils::checkNIP('106-00-00-062');
        $this->assertEquals($is, true);

        $is = NIPUntils::checkNIP('109-21-18-884');
        $this->assertEquals($is, true);

        $is = NIPUntils::checkNIP('5314803106');
        $this->assertEquals($is, true);

        $is = NIPUntils::checkNIP('1196609029');
        $this->assertEquals($is, true);

        $is = NIPUntils::checkNIP('1196609021');
        $this->assertEquals($is, false);
    }
}
