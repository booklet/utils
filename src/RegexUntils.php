<?php
class RegexUntils
{
    public static function getNumbersFromString($string)
    {
        preg_match_all('/\d+/', $string, $matches);

        return join('', $matches[0]);
    }
}
