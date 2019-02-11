<?php
class FloatUntilsTest extends \CustomPHPUnitTestCase
{
    public function testFnCeilTo()
    {
        $ceil = FloatUntils::ceilTo(1.222, 1);
        $this->assertEquals($ceil, 1.3);

        $ceil = FloatUntils::ceilTo(1.888, 1);
        $this->assertEquals($ceil, 1.9);

        $ceil = FloatUntils::ceilTo(1.222222222, 3);
        $this->assertEquals($ceil, 1.223);
    }

    public function testFnFloorTo()
    {
        $ceil = FloatUntils::floorTo(1.222, 1);
        $this->assertEquals($ceil, 1.2);

        $ceil = FloatUntils::floorTo(1.888, 1);
        $this->assertEquals($ceil, 1.8);

        $ceil = FloatUntils::floorTo(1.222822222, 3);
        $this->assertEquals($ceil, 1.222);
    }

    public function testGetWrapperFolderById()
    {
        $wrapper_folder = FilesUntils::getWrapperFolderById(0);
        $this->assertEquals($wrapper_folder, '000');

        $wrapper_folder = FilesUntils::getWrapperFolderById(1);
        $this->assertEquals($wrapper_folder, '000');

        $wrapper_folder = FilesUntils::getWrapperFolderById(999);
        $this->assertEquals($wrapper_folder, '000');

        $wrapper_folder = FilesUntils::getWrapperFolderById(1000);
        $this->assertEquals($wrapper_folder, '001');

        $wrapper_folder = FilesUntils::getWrapperFolderById(1999);
        $this->assertEquals($wrapper_folder, '001');

        $wrapper_folder = FilesUntils::getWrapperFolderById(2000);
        $this->assertEquals($wrapper_folder, '002');
    }
}
