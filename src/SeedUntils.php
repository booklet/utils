<?php
class SeedUntils
{
    public static function checkIfCreated($model, $expect_count_items)
    {
        $count_items = count($model::all());
        if ($count_items != $expect_count_items) {
            throw new Exception($model . ' it was not created. Expect ' . $expect_count_items . ' got ' . $count_items . ' items.');
        }
    }
}
