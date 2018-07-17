<?php
class PriceUntils
{
    const DEFAULT_VAT_STAKE = 23;

    // calculate brutto and vat form netto price
    public static function bruttoVatFormNetto($netto, $vat_stake = null)
    {
        $netto = self::convertToFloatIfString($netto);
        $netto = round($netto, 2);
        $vat = ($netto * self::vatStake($vat_stake)) - $netto;
        $vat = round($vat, 2);
        $brutto = $netto + $vat;

        return [round($brutto, 2), $vat];
    }

    public static function nettoVatFormBrutto($brutto, $vat_stake = null)
    {
        $brutto = self::convertToFloatIfString($brutto);
        $brutto = round($brutto, 2);
        $vat = $brutto - ($brutto / self::vatStake($vat_stake));
        $vat = round($vat, 2);
        $netto = $brutto - $vat;

        return [round($netto, 2), $vat];
    }

    private static function vatStake($vat_stake)
    {
        if ($vat_stake == null) {
            $vat_stake = self::DEFAULT_VAT_STAKE;
        }

        if ($vat_stake == 'zw') {
            return 1; // no vat
        }

        // 23 => 1.23
        return intval($vat_stake) / 100 + 1;
    }

    // '123,45' => 123.45
    // '123 45,56' => 12345.56
    private static function convertToFloatIfString($price)
    {
        // comas to dot
        if (is_string($price)) {
            $price = str_replace(',', '.', $price);
        }
        // remove spaces
        if (is_string($price)) {
            $price = preg_replace('/\s+/', '', $price);
        }

        return floatval($price);
    }

    public static function floatToCents($val)
    {
        $val = round($val, 2);
        $val = number_format($val, 2, '.', '') * 100;
        $val = strval($val); // witout this, intval produce form 230(float) => 229(int)

        return intval($val);
    }

    public static function centToFloat($val)
    {
        return (int) $val / 100;
    }

    public static function anyToDecimal($val)
    {
        if (is_null($val)) {
            return $val;
        }

        $val = self::convertToFloatIfString($val);

        return round($val, 2);
    }
}
