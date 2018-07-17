<?php
class PriceUntilsTest extends TesterCase
{
    public $skip_database_clear_before = ['all'];

    public function testBruttoVatFormNetto()
    {
        list($brutto, $vat) = PriceUntils::bruttoVatFormNetto(100.00);
        Assert::expect($brutto)->to_equal(123.00);
        Assert::expect($vat)->to_equal(23.00);

        list($brutto, $vat) = PriceUntils::bruttoVatFormNetto('74461.45');
        Assert::expect($brutto)->to_equal(91587.58);
        Assert::expect($vat)->to_equal(17126.13);

        list($brutto, $vat) = PriceUntils::bruttoVatFormNetto(74461.99);
        Assert::expect($brutto)->to_equal(91588.25);
        Assert::expect($vat)->to_equal(17126.26);

        list($brutto, $vat) = PriceUntils::bruttoVatFormNetto(0.00);
        Assert::expect($brutto)->to_equal(0.00);
        Assert::expect($vat)->to_equal(0.00);

        list($brutto, $vat) = PriceUntils::bruttoVatFormNetto(74461.99, 8);
        Assert::expect($brutto)->to_equal(80418.95);
        Assert::expect($vat)->to_equal(5956.96);

        list($brutto, $vat) = PriceUntils::bruttoVatFormNetto(74461.99, 'zw');
        Assert::expect($brutto)->to_equal(74461.99);
        Assert::expect($vat)->to_equal(0.0);
    }

    public function testNettoVatFormBrutto()
    {
        list($netto, $vat) = PriceUntils::nettoVatFormBrutto(123.00);
        Assert::expect($netto)->to_equal(100.00);
        Assert::expect($vat)->to_equal(23.00);

        list($netto, $vat) = PriceUntils::nettoVatFormBrutto('1 678,96');
        Assert::expect($netto)->to_equal(1365.01);
        Assert::expect($vat)->to_equal(313.95);

        list($netto, $vat) = PriceUntils::nettoVatFormBrutto('1303.80');
        Assert::expect($netto)->to_equal(1060.00);
        Assert::expect($vat)->to_equal(243.80);

        list($netto, $vat) = PriceUntils::nettoVatFormBrutto('0.00');
        Assert::expect($netto)->to_equal(0.00);
        Assert::expect($vat)->to_equal(0.00);

        list($netto, $vat) = PriceUntils::nettoVatFormBrutto(74461.99, 8);
        Assert::expect($netto)->to_equal(68946.29);
        Assert::expect($vat)->to_equal(5515.70);

        list($netto, $vat) = PriceUntils::nettoVatFormBrutto(74461.99, 'zw');
        Assert::expect($netto)->to_equal(74461.99);
        Assert::expect($vat)->to_equal(0.00);
    }

    public function testFloatToCents()
    {
        $test_nums = [
            ['float' => 2.34,  'cents' => 234],
            ['float' => 2.1,   'cents' => 210],
            ['float' => 2.30,  'cents' => 230],
            ['float' => 2.33,  'cents' => 233],
            ['float' => 2,     'cents' => 200],
            ['float' => 2.344, 'cents' => 234],
            ['float' => 2.346, 'cents' => 235],
        ];

        foreach ($test_nums as $item) {
            $cents = PriceUntils::floatToCents($item['float']);
            Assert::expect($cents)->to_equal($item['cents']);
        }
    }
}
