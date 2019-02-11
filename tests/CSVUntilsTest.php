<?php
class CSVUntilsTest extends \CustomPHPUnitTestCase
{
    public function testParseCsvToArrayBooks()
    {
        $csv_array = CSVUntils::parseCsvToArray('tests/fixtures/csv/books.csv');

        $expect_results = [
             ['rating', 'title', 'author', 'type', 'asin', 'tags', 'review'],
             ['0', 'The Killing Kind', 'John Connolly', 'Book', '0340771224', '', "i still haven't had time to read this one..."],
             ['0', 'The Third Secret', 'Steve Berry', 'Book', '0340899263', '', 'need to find time to read this book'],
             ['3', 'The Last Templar', 'Raymond Khoury', 'Book', '0752880705', '', ''],
             ['5', 'The Traveller', 'John Twelve Hawks', 'Book', '059305430X', '', ''],
             ['4', 'Crisis Four', 'Andy Mcnab', 'Book', '0345428080', '', ''],
             ['5', 'Prey', 'Michael Crichton', 'Book', '0007154534', '', ''],
             ['3', 'The Broker (Paperback)', 'John Grisham', 'Book', '0440241588', 'book johngrisham', 'good book, but is slow in the middle'],
             ['3', 'Without Blood (Paperback)', 'Alessandro Baricco', 'Book', '1841955744', '', ''],
             ['5', 'State of Fear (Paperback)', 'Michael Crichton', 'Book', '0061015733', '', ''],
             ['4', 'The Rule of Four (Paperback)', 'Ian Caldwell', 'Book', '0099451956', 'book bestseller', ''],
             ['4', 'Deception Point (Paperback)', 'Dan Brown', 'Book', '0671027387', 'book danbrown bestseller', ''],
             ['5', 'Digital Fortress : A Thriller (Mass Market Paperback)', 'Dan Brown', 'Book', '0312995423', 'book danbrown bestseller', ''],
             ['5', 'Angels & Demons (Mass Market Paperback)', 'Dan Brown', 'Book', '0671027360', 'book danbrown bestseller', ''],
             ['4', 'The Da Vinci Code (Hardcover)', 'Dan Brown', '   Book   ', '0385504209', 'book movie danbrown bestseller davinci', ''],
        ];

        $this->assertEquals($csv_array, $expect_results);
    }

    public function testParseCsvToArrayBikes()
    {
        $csv_array = CSVUntils::parseCsvToArray('tests/fixtures/csv/bike_stickers.csv', ['remove_header' => true]);

        $expect_results = [
            ['820', 'Piotr ', 'Lisiecki  0Rh+', '1', ''],
            ['819', 'Bartłomiej', 'Cywiński', '2', ''],
            ['819', 'Aneta', 'Janicka', '2', ''],
            ['818', 'ANGIE', '   ', '1', ''],
            ['817', 'Tomasz ', 'STANO', '3', ''],
            ['817', 'Marcin ', 'BLAUT ', '3', ''],
            ['817', 'Paulina ', 'KRUK', '3', ''],
            ['816', 'RAFAŁ', 'KACZMARCZYK', '1', ''],
            ['815', 'Tomasz', 'Sulski', '1', ''],
            ['814', 'LooZnka', '                  :)', '1', 'POMARANCZOWY BUDYNEK 1 PIĘTRO'],
            ['813', 'R.', 'Wilkowiecki', '2', ''],
            ['813', 'R.', 'Wilkowiecki', '2', ''],
            ['811', 'Paweł ', 'Lachowicz', '1', ''],
            ['810', 'Wojtek ', 'Sielewicz ORH+', '1', ''],
            ['808', 'Irek', 'Kucewicz', '1', ''],
            ['807', 'Filip', 'Kaliszewski (A Rh+)', '1', ''],
            ['806', 'Katarzyna', 'Klimaszewska', '1', ''],
            ['805', 'Agnieszka', 'Kalinowska', '2', ''],
            ['805', 'Agnieszka', 'Kalinowska', '2', ''],
            ['804', 'Marcin', 'WIECZOREK', '1', ''],
            ['803', 'Piotr', 'PŁONECZKA A Rh+', '1', ''],
            ['800', 'Piotr', 'Deis', '2', ''],
            ['800', 'Zygmunt ', 'Jonatowski ', '2', ''],
            ['799', 'MAŁGORZATA', 'DUŃKO A Rh-', '2', ''],
            ['799', 'ANNA ', 'DUŃKO  A Rh+', '2', ''],
        ];

        $this->assertEquals($csv_array, $expect_results);
    }

    public function testParseCsvToArrayKody()
    {
        $csv_array = CSVUntils::parseCsvToArray('tests/fixtures/csv/kody.tsv');

        $expect_results = [
            ['model1', 'model2', 'rozmiar', '@EAN', 'Kolor'],
            ['50', '10', 'L', 'Users:booklet:Desktop:kody:kody:4043738422511.pdf', 'Blm'],
            ['50', '10', 'M', 'Users:booklet:Desktop:kody:kody:4043738422504.pdf', 'Blm'],
            ['50', '10', 'S', 'Users:booklet:Desktop:kody:kody:4043738422498.pdf', 'Blm'],
            ['50', '10', 'XL', 'Users:booklet:Desktop:kody:kody:4043738422528.pdf', 'Blm'],
            ['50', '10', 'XXL', 'Users:booklet:Desktop:kody:kody:4043738422535.pdf', 'Blm'],
            ['50', '10', 'L', 'Users:booklet:Desktop:kody:kody:4043738416107.pdf', 'Grs'],
            ['50', '10', 'S', 'Users:booklet:Desktop:kody:kody:4043738416084.pdf', 'Grs'],
        ];

        $this->assertEquals($csv_array, $expect_results);
    }
}
