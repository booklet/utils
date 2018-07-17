<?php
class SortUntils
{
    public static function sortAndGetMaxByAttribInAssocArray(array $items_array, string $attribute)
    {
        $items_array = self::sortDescAssocArrayByAttrib($items_array, $attribute);

        return $items_array[0];
    }

    public static function sortDescAssocArrayByAttrib(array $items_array, string $attribute)
    {
        usort($items_array, function ($item1, $item2) use ($attribute) {
            return $item2[$attribute] <=> $item1[$attribute];
        });

        return $items_array;
    }

    public static function sortAscAssocArrayByAttrib(array $items_array, string $attribute)
    {
        usort($items_array, function ($item1, $item2) use ($attribute) {
            return $item1[$attribute] <=> $item2[$attribute];
        });

        return $items_array;
    }
}
