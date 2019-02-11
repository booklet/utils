<?php
class UrlUntilsTest extends \CustomPHPUnitTestCase
{
    public function testGetHost()
    {
        $host = UrlUntils::getDomainWithProtocol('https://www.booklet.pl/test/subpatch?param=val#test');
        $this->assertEquals($host, 'https://booklet.pl');

        $host = UrlUntils::getDomainWithProtocol('http://www.booklet.pl/test/subpatch?param=val#test');
        $this->assertEquals($host, 'http://booklet.pl');

        $host = UrlUntils::getDomainWithProtocol('www.booklet.pl/test/subpatch?param=val#test');
        $this->assertEquals($host, 'http://booklet.pl');

        $host = UrlUntils::getDomainWithProtocol('booklet.pl');
        $this->assertEquals($host, 'http://booklet.pl');

        // TODO Add support to invalid urls
        // $host = UrlUntils::getDomainWithProtocol('booklet');
        // $this->assertEquals($host, false);
    }
}
