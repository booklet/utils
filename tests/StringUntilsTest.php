<?php
class StringUntilsTest extends \CustomPHPUnitTestCase
{
    public function testFnexplodeCamelcase()
    {
        $testdata = [
            'oneTwoThreeFour' => ['one', 'Two', 'Three', 'Four'],
            'oneTwo' => ['one', 'Two'],
            'onetwothreefour' => ['onetwothreefour'],
            'Some4Numbers234' => ['Some4', 'Numbers234'],
        ];

        foreach ($testdata as $from => $to) {
            $exploded_arr = StringUntils::explodeCamelcase($from);
            $this->assertEquals($exploded_arr, $to);
        }
    }

    public function testFntoCamelCase()
    {
        $testdata = [
            'one-two-three-four' => 'OneTwoThreeFour',
            'one_two_three_four' => 'OneTwoThreeFour',
            'OneTwoThreeFour' => 'OneTwoThreeFour',
        ];

        foreach ($testdata as $from => $to) {
            $camel_case = StringUntils::toCamelCase($from);
            $this->assertEquals($camel_case, $to);
        }
    }

    public function testFnfileNameFormPathToClass()
    {
        $testdata = [
            'tests/models/users_test.php' => 'UsersTest',
            'tests/models/UsersTest.php' => 'UsersTest',
            'UsersTest.php' => 'UsersTest',
        ];

        foreach ($testdata as $from => $to) {
            $file_name = StringUntils::fileNameFormPathToClass($from);
            $this->assertEquals($file_name, $to);
        }
    }

    public function testFnStringInclude()
    {
        $is_include = StringUntils::isInclude('my test string', 'test');
        $this->assertEquals($is_include, true);

        $is_include = StringUntils::isInclude('my test string', 'notexist');
        $this->assertEquals($is_include, false);
    }

    public function testIsContainsNumbers()
    {
        $is_contains_numbers = StringUntils::isContainsNumbers('no # numbers text % ]');
        $this->assertEquals($is_contains_numbers, false);

        $is_contains_numbers = StringUntils::isContainsNumbers('text with 123 digits');
        $this->assertEquals($is_contains_numbers, true);
    }

    public function testIsContainsLetters()
    {
        $is_contains_letters = StringUntils::isContainsLetters('1234 $%^ () 09');
        $this->assertEquals($is_contains_letters, false);

        $is_contains_letters = StringUntils::isContainsLetters('123 text With letters');
        $this->assertEquals($is_contains_letters, true);
    }

    public function testFnTransliterate()
    {
        $testdata = [
            '2015-11-27 15:02:37.820652' => '20151127150237820652',
            'Валерий Глошанчук' => 'valerijglosancuk',
            '„UTASZ-SPEED” Sp. z o.o.' => 'utaszspeedspzoo',
            ' „AL-JAN” Janusz Kluczewski' => 'aljanjanuszkluczewski',
            '“AZIS” -Mining Service Sp. z o.o.' => 'azisminingservicespzoo',
            'F.H.U. \"MAX-SPORT\"' => 'fhumaxsport',
            'N-ctwo Gł.Bród - ochl - Dorota Ławreszuk' => 'nctwoglbrodochldorotalawreszuk',
            'Black&Tan kontakt' => 'blacktankontakt',
            'STONE+GLASS' => 'stoneglass',
            'Półśkię żńąki' => 'polskieznaki',
        ];

        foreach ($testdata as $from => $to) {
            $clear_text = StringUntils::transliterate($from);
            $this->assertEquals($clear_text, $to);
        }
    }

    public function testGenerateRandomString()
    {
        $string = StringUntils::generateRandomString(50);
        $this->assertEquals(strlen($string), 50);
    }

    public function testGenerateRandomDigitsString()
    {
        $string = StringUntils::generateRandomDigitsString(10);
        $this->assertEquals(preg_match_all('/[0-9]/', $string), 10);
    }

    public static function generateRandomDigitsString($length = 10)
    {
        $characters = '0123456789';
        $randomString = self::generateRandom($length, $characters);

        return $randomString;
    }

    public function testFncamelCaseToUnderscore()
    {
        $testdata = [
            'simpleTest' => 'simple_test',
            'easy' => 'easy',
            'HTML' => 'html',
            'simpleXML' => 'simple_xml',
            'PDFLoad' => 'pdf_load',
            'startMIDDLELast' => 'start_middle_last',
            'AString' => 'a_string',
            'Some4Numbers234' => 'some4_numbers234',
            'TEST123String' => 'test123_string',
        ];

        // TODO
        // add extra cases:
        // return strtolower(preg_replace(['/([a-z\d])([A-Z])/', '/([^_])([A-Z][a-z])/'], '$1_$2', $string));
        // hello_world => hello_world
        // hello__world => hello__world
        // _hello_world_ => _hello_world_
        // hello_World => hello_world
        // HelloWorld => hello_world
        // helloWorldFoo => hello_world_foo
        // hello-world => hello-world
        // myHTMLFiLe => my_html_fi_le
        // aBaBaB => a_ba_ba_b
        // BaBaBa => ba_ba_ba
        // libC => lib_c

        foreach ($testdata as $camel_case => $underscore) {
            $underscored_camel_case = StringUntils::camelCaseToUnderscore($camel_case);
            $this->assertEquals($underscored_camel_case, $underscore);
        }
    }

    public function testRemoveAccentsAndDiacritics()
    {
        $normalize = StringUntils::removeAccentsAndDiacritics('Śtręët ņąmę Ćity, ńąmę Čómpąńy-ńąmę Ċõntaçt/ňamê Γεια σου κόσμε');
        $this->assertEquals($normalize, 'Street name City, name Company-name Contact/name Geia sou kosme');
    }

    public function testSlug()
    {
        $normalize = StringUntils::slug('Śtręët  ņąmę Ćity ńąmę /_Čómpąńy ńąmę Ċõntaçt ňamê');
        $this->assertEquals($normalize, 'street-name-city-name-company-name-contact-name');
    }

    public function testSanitizeFileName()
    {
        $sanitize = StringUntils::sanitizeFileName('Pł\\ik $ź_pÓł\'śki/mi-"&-(Żnąk*^ąmi)_.02?.pdf');
        $this->assertEquals($sanitize, 'Plik_z_pOlskimi_Znakami_.02.pdf');
    }

    public function testStartsWith()
    {
        $this->assertEquals(StringUntils::areStartsWith('ItemsPush', 'Push'), false);
        $this->assertEquals(StringUntils::areStartsWith('ItemsPush', 'Items'), true);
        $this->assertEquals(StringUntils::areStartsWith('ItemsPush', 'ItemsPush'), true);
        $this->assertEquals(StringUntils::areStartsWith('ItemsPush', 'ItemsPushPush'), false);
    }

    public function testEndsWith()
    {
        $this->assertEquals(StringUntils::areEndsWith('ItemsPush', 'Push'), true);
        $this->assertEquals(StringUntils::areEndsWith('ItemsPush', 'Items'), false);
        $this->assertEquals(StringUntils::areEndsWith('ItemsPush', 'ItemsPush'), true);
        $this->assertEquals(StringUntils::areEndsWith('ItemsPush', 'ItemsPushPush'), false);
    }

    public function testRemoveWordsShorterThan()
    {
        $this->assertEquals(StringUntils::removeWordsShorterThan('Naklejki na słoiki'), 'Naklejki słoiki');
        $this->assertEquals(StringUntils::removeWordsShorterThan('Co to za naklejki na słoiki hmm'), 'naklejki słoiki');
        $this->assertEquals(StringUntils::removeWordsShorterThan('1 a aa aaa 99 aaaa aaa aaaaa aaa aa a 0'), 'aaaa aaaaa');
    }

    public function testTruncate()
    {
        $this->assertEquals(StringUntils::truncate('Co to za naklejki na słoiki hmm', 19, ''), 'Co to za naklejki');
        $this->assertEquals(StringUntils::truncate('Co to za naklejki', 20), 'Co to za naklejki');
        $this->assertEquals(StringUntils::truncate('Limiting or Truncating strings using PHP', 37), 'Limiting or Truncating strings using...');
    }

    public function testExtractEmails()
    {
        $emails = StringUntils::extractEmails('"piotrstarzynski@kancelariasapereaude.home.pl piotrstarzynski@kancelariasapereaude.home.pl" <piotrstarzynski@kancelariasapereaude.home.pl>');

        $expect = [
            'piotrstarzynski@kancelariasapereaude.home.pl',
            'piotrstarzynski@kancelariasapereaude.home.pl',
            'piotrstarzynski@kancelariasapereaude.home.pl',
        ];
        $this->assertEquals($emails, $expect);
    }

    public function testExtractUniqueEmails()
    {
        $emails = StringUntils::extractUniqueEmails('"piotrstarzynski@kancelariasapereaude.home.pl piotrstarzynski@kancelariasapereaude.home.pl" <piotrstarzynski@kancelariasapereaude.home.pl>');

        $expect = [
            'piotrstarzynski@kancelariasapereaude.home.pl',
        ];
        $this->assertEquals($emails, $expect);

        $emails = StringUntils::extractUniqueEmails('ereaude.home.pl');

        $expect = [];
        $this->assertEquals($emails, $expect);
    }

    public function testRemoveAllCharactersThatNotInPassedArray()
    {
        $allowed_characters = ['a', 'ą', 'Ą', 'b', 'B', 'ć', 'Ć', '!', '-', '2', '3', '4', "\n", "\r"];
        $text = "aAąĄbBcCćĆdDeEęĘfFgGhHiIjJkKlLłŁ!\"#$%&'()*+,-./0123456789:;<=>?@[\]^_`{|}~\n\r";

        $filtered_text = StringUntils::removeAllCharactersThatNotInPassedArray($text, $allowed_characters);

        $this->assertEquals("aąĄbBćĆ!-234\n\r", $filtered_text);
    }

    public function testSplitMultibyteStringToArray()
    {
        $text = "aąęĘłÓźŻ*+`{~é主\r楼\n";

        $filtered_text = StringUntils::splitMultibyteStringToArray($text);

        $this->assertEquals(['a', 'ą', 'ę', 'Ę', 'ł', 'Ó', 'ź', 'Ż', '*', '+', '`', '{', '~', 'é', '主', "\r", '楼', "\n"], $filtered_text);
    }
}
