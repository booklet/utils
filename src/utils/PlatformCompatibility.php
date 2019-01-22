<?php

namespace Utils;

class PlatformCompatibility
{
    public static function getPlatform()
    {
        return strtoupper(substr(PHP_OS, 0, 3));
    }

    public static function isWindowsPlatform()
    {
        return 'WIN' == strtoupper(substr(PHP_OS, 0, 3));
    }

    public static function fixWindowsFilePathWithSlashes($path, array $params = [])
    {
        $platform = $params['platform'] ?? self::getPlatform();

        if ('WIN' == $platform) {
            $path = str_replace('\\', '/', $path);
        }

        return $path;
    }
}
