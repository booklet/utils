<?php
class NumbersUntilsTest extends \CustomPHPUnitTestCase
{
    public function testFormatCurrency()
    {
        $fc = NumbersUntils::formatCurrency(1234567.899999);
        $this->assertEquals($fc, '1 234 567,90 zł');
    }

    public function testIsNumberBetween()
    {
        $is = NumbersUntils::isNumberBetween(99, 100, 200);
        $this->assertEquals($is, false);

        $is = NumbersUntils::isNumberBetween(100, 100, 200);
        $this->assertEquals($is, true);

        $is = NumbersUntils::isNumberBetween(150, 100, 200);
        $this->assertEquals($is, true);

        $is = NumbersUntils::isNumberBetween(200, 100, 200);
        $this->assertEquals($is, true);

        $is = NumbersUntils::isNumberBetween(201, 100, 200);
        $this->assertEquals($is, false);
    }
}
