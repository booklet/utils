<?php

namespace Utils;

use Assert;

class PlatformCompatibilityTest extends \TesterCase
{
    public function testWindowsFilePathWithSlashesFixing()
    {
        $path = PlatformCompatibility::fixWindowsFilePathWithSlashes('C:\\www\\itdocs', ['platform' => 'WIN']);
        $expect = 'C:/www/itdocs';

        Assert::expect($path)->to_equal($expect);
    }

    public function testWindowsFilePathWithSlashesFixingDoNotChangePath()
    {
        $path = PlatformCompatibility::fixWindowsFilePathWithSlashes('C:\\www\\itdocs', ['platform' => 'LINUX']);
        $expect = 'C:\\www\\itdocs';

        Assert::expect($path)->to_equal($expect);
    }
}
