<?php
class NIPUntils
{
    public static function checkNIP($number)
    {
        $number = preg_replace('/\D/', '', $number);

        if (strlen($number) !== 10) {
            return false;
        }

        $arr_steps = array(6, 5, 7, 2, 3, 4, 5, 6, 7);
        $int_sum = 0;

        for ($i = 0; $i < 9; $i++) {
            $int_sum += $arr_steps[$i] * $number[$i];
        }

        $int = $int_sum % 11;
        $int_control_nr = $int === 10 ? 0 : $int;

        if ($int_control_nr == $number[9]) {
            return true;
        }

        return false;
    }
}
