<?php

namespace Utils;

class PlatformCompatibility
{
    public static function isWindowsPlatform()
    {
        return 'WIN' == strtoupper(substr(PHP_OS, 0, 3));
    }

    public static function fixWindowsFilePathWithSlashes($path)
    {
        if (self::isWindowsEnvironment()) {
            return str_replace('\\', '/', $path);
        }
    }
}
