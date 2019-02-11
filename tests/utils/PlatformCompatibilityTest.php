<?php
namespace Utils;

use Assert;

class PlatformCompatibilityTest extends \CustomPHPUnitTestCase
{
    public function testWindowsFilePathWithSlashesFixing()
    {
        $path = PlatformCompatibility::fixWindowsFilePathWithSlashes('C:\\www\\itdocs', ['platform' => 'WIN']);
        $expect = 'C:/www/itdocs';

        $this->assertEquals($path, $expect);
    }

    public function testWindowsFilePathWithSlashesFixingDoNotChangePath()
    {
        $path = PlatformCompatibility::fixWindowsFilePathWithSlashes('C:\\www\\itdocs', ['platform' => 'LINUX']);
        $expect = 'C:\\www\\itdocs';

        $this->assertEquals($path, $expect);
    }
}
