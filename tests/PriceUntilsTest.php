<?php
class PriceUntilsTest extends \CustomPHPUnitTestCase
{
    public function testBruttoVatFormNetto()
    {
        list($brutto, $vat) = PriceUntils::bruttoVatFormNetto(100.00);
        $this->assertEquals($brutto, 123.00);
        $this->assertEquals($vat, 23.00);

        list($brutto, $vat) = PriceUntils::bruttoVatFormNetto('74461.45');
        $this->assertEquals($brutto, 91587.58);
        $this->assertEquals($vat, 17126.13);

        list($brutto, $vat) = PriceUntils::bruttoVatFormNetto(74461.99);
        $this->assertEquals($brutto, 91588.25);
        $this->assertEquals($vat, 17126.26);

        list($brutto, $vat) = PriceUntils::bruttoVatFormNetto(0.00);
        $this->assertEquals($brutto, 0.00);
        $this->assertEquals($vat, 0.00);

        list($brutto, $vat) = PriceUntils::bruttoVatFormNetto(74461.99, 8);
        $this->assertEquals($brutto, 80418.95);
        $this->assertEquals($vat, 5956.96);

        list($brutto, $vat) = PriceUntils::bruttoVatFormNetto(74461.99, 'zw');
        $this->assertEquals($brutto, 74461.99);
        $this->assertEquals($vat, 0.0);
    }

    public function testNettoVatFormBrutto()
    {
        list($netto, $vat) = PriceUntils::nettoVatFormBrutto(123.00);
        $this->assertEquals($netto, 100.00);
        $this->assertEquals($vat, 23.00);

        list($netto, $vat) = PriceUntils::nettoVatFormBrutto('1 678,96');
        $this->assertEquals($netto, 1365.01);
        $this->assertEquals($vat, 313.95);

        list($netto, $vat) = PriceUntils::nettoVatFormBrutto('1303.80');
        $this->assertEquals($netto, 1060.00);
        $this->assertEquals($vat, 243.80);

        list($netto, $vat) = PriceUntils::nettoVatFormBrutto('0.00');
        $this->assertEquals($netto, 0.00);
        $this->assertEquals($vat, 0.00);

        list($netto, $vat) = PriceUntils::nettoVatFormBrutto(74461.99, 8);
        $this->assertEquals($netto, 68946.29);
        $this->assertEquals($vat, 5515.70);

        list($netto, $vat) = PriceUntils::nettoVatFormBrutto(74461.99, 'zw');
        $this->assertEquals($netto, 74461.99);
        $this->assertEquals($vat, 0.00);
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
            $this->assertEquals($cents, $item['cents']);
        }
    }
}
