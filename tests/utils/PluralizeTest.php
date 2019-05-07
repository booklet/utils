<?php
namespace Utils;

class PluralizeTest extends \CustomPHPUnitTestCase
{
    public function testRule()
    {
        $this->assertEquals('many', Pluralize::rule(0));
        $this->assertEquals('other', Pluralize::rule(0.5));
        $this->assertEquals('one', Pluralize::rule(1));
        $this->assertEquals('few', Pluralize::rule(2));
        $this->assertEquals('few', Pluralize::rule(3));
        $this->assertEquals('few', Pluralize::rule(4));
        $this->assertEquals('many', Pluralize::rule(5));
        $this->assertEquals('other', Pluralize::rule(5.4));
        $this->assertEquals('many', Pluralize::rule(15));
        $this->assertEquals('many', Pluralize::rule(99));
        $this->assertEquals('few', Pluralize::rule(102));
        $this->assertEquals('many', Pluralize::rule(999));
    }

    public function testWord()
    {
        $words_definitions = [
            ['pakiet', 'pakiety', 'pakietów', 'pakietu'],
            ['zestaw', 'zestawy', 'zestawów', 'zestawu'],
            ['fotomagnes', 'fotomagnesy', 'fotomagnesów', 'fotomagnesów'],
            ['recenzja', 'recenzje', 'recenzji', 'recenzji'],
        ];

        $this->assertEquals('pakietów', Pluralize::word('pakiet', 0, $words_definitions));
        $this->assertEquals('pakietu', Pluralize::word('pakiet', 0.5, $words_definitions));
        $this->assertEquals('pakiet', Pluralize::word('pakiet', 1, $words_definitions));
        $this->assertEquals('fotomagnesy', Pluralize::word('fotomagnes', 2, $words_definitions));
        $this->assertEquals('fotomagnesy', Pluralize::word('fotomagnesów', 3, $words_definitions));
        $this->assertEquals('zestawy', Pluralize::word('zestaw', 4, $words_definitions));
        $this->assertEquals('zestawów', Pluralize::word('zestaw', 5, $words_definitions));
        $this->assertEquals('zestawu', Pluralize::word('zestaw', 5.4, $words_definitions));
        $this->assertEquals('zestawów', Pluralize::word('zestaw', 15, $words_definitions));
        $this->assertEquals('recenzji', Pluralize::word('recenzje', 99, $words_definitions));
        $this->assertEquals('zestawy', Pluralize::word('zestaw', 102, $words_definitions));
        $this->assertEquals('zestawów', Pluralize::word('zestaw', 999, $words_definitions));
    }
}
