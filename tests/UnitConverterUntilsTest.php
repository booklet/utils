<?php
class UnitConverterUntilsTest extends \CustomPHPUnitTestCase
{
    public function testPtToMm()
    {
        $this->assertEquals(round(UnitConverterUntils::ptToMm(100), 8), round(35.277786107255, 8));
        $this->assertEquals(UnitConverterUntils::ptToMm(100, ['precision' => 2]), 35.28);
        $this->assertEquals(round(UnitConverterUntils::ptToMm(348.7), 8), round(123.013640156, 8));
        $this->assertEquals(UnitConverterUntils::ptToMm(100, ['precision' => 0]), 35.0);
    }

    public function testPtToPx()
    {
        $this->assertEquals(UnitConverterUntils::ptToPx(100), 417);
        $this->assertEquals(UnitConverterUntils::ptToPx(100, ['dpi' => 72]), 100);
        $this->assertEquals(UnitConverterUntils::ptToPx(2399.8), 9999);
        $this->assertEquals(UnitConverterUntils::ptToPx(35.277786107255), 147);
    }

    public function testPxToMm()
    {
        $this->assertEquals(UnitConverterUntils::pxToMm(100, ['precision' => 2]), 8.47);
        $this->assertEquals(UnitConverterUntils::pxToMm(100, ['dpi' => 72, 'precision' => 2]), 35.28);
        $this->assertEquals(UnitConverterUntils::pxToMm(118098, ['precision' => 2]), 9998.96);
        $this->assertEquals(UnitConverterUntils::pxToMm(899, ['precision' => 2]), 76.12);
    }

    public function testPxToPt()
    {
        $this->assertEquals(UnitConverterUntils::pxToPt(100), 24);
        $this->assertEquals(UnitConverterUntils::pxToPt(100, ['dpi' => 72]), 100);
        $this->assertEquals(UnitConverterUntils::pxToPt(118098), 28343.52);
        $this->assertEquals(UnitConverterUntils::pxToPt(899), 215.76);
    }

    public function testMmToPx()
    {
        $this->assertEquals(UnitConverterUntils::mmToPx(100), 1181);
        $this->assertEquals(UnitConverterUntils::mmToPx(100, ['dpi' => 72]), 283);
        $this->assertEquals(UnitConverterUntils::mmToPx(20.5), 242);
    }
}
