<?php
class SortUntilsTest extends \CustomPHPUnitTestCase
{
    public function arrayData()
    {
        return [
            ['attrib1' => 1, 'attrib2' => 10, 'attrib3' => -100],
            ['attrib1' => 2, 'attrib2' => 20, 'attrib3' => 0],
            ['attrib1' => 3, 'attrib2' => 20, 'attrib3' => 200],
            ['attrib1' => 4, 'attrib2' => 40, 'attrib3' => 100],
        ];
    }

    public function testSortAndGetMaxByAttribInAssocArray()
    {
        $arr = SortUntils::sortAndGetMaxByAttribInAssocArray($this->arrayData(), 'attrib1');
        $expect = ['attrib1' => 4, 'attrib2' => 40, 'attrib3' => 100];

        $this->assertEquals($arr, $expect);

        $arr = SortUntils::sortAndGetMaxByAttribInAssocArray($this->arrayData(), 'attrib3');
        $expect = ['attrib1' => 3, 'attrib2' => 20, 'attrib3' => 200];

        $this->assertEquals($arr, $expect);
    }
}
