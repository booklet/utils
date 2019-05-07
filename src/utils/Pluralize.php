<?php
namespace Utils;

class Pluralize
{
    // Base on:
    // http://www.unicode.org/cldr/charts/33/supplemental/language_plural_rules.html#pl
    public static function rule($number)
    {
        if ($number === 1) {
            return 'one';
        }

        $integer = is_integer($number);
        $mod10 = $number % 10;
        $mod100 = $number % 100;

        if ($integer && (($mod10 >= 2 && $mod10 <= 4) && ($mod100 < 12 || $mod100 > 14))) {
            return 'few';
        }

        if ($integer && (($mod10 === 0 || $mod10 === 1) || ($mod10 >= 5 && $mod10 <= 9 || $mod100 >= 12 && $mod100 <= 14))) {
            return 'many';
        }

        return 'other';
    }

    // Words definitions example:
    // $words_definitions = [
    //     ['opinia', 'opinie', 'opinii', 'opinii'],
    //     ['uczestnik', 'uczestników', 'uczestników', 'uczestnika'],
    // ];
    // [0] 1 => opinia
    // [1] 2 => opinie
    // [2] 5 => opinii
    // [3] 1.5 => opinii
    public static function word(string $word, $number, array $words_definitions = [])
    {
        $rule = self::rule($number);
        $rules_to_words_definition_index = ['one' => 0, 'few' => 1, 'many' => 2, 'other' => 3];

        foreach ($words_definitions as $words_definition) {
            if (in_array($word, $words_definition)) {
                return $words_definition[$rules_to_words_definition_index[$rule]];
            }
        }

        return $word;
    }
}
