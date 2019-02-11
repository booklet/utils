<?php
class FilesUntilsTest extends \CustomPHPUnitTestCase
{
    public function testIdToPath()
    {
        $this->assertEquals(FilesUntils::idToPath(0), '000/000/000/');
        $this->assertEquals(FilesUntils::idToPath(1234), '000/001/234/');
    }

    public function testObjectIdToPath()
    {
        $object = (object) ['id' => 0];

        $this->assertEquals(FilesUntils::objectIdToPath($object), '000/000/000/');

        $object = (object) ['id' => 1234];

        $this->assertEquals(FilesUntils::objectIdToPath($object), '000/001/234/');

        try {
            $object = (object) [];
            $test = FilesUntils::objectIdToPath($object);
        } catch (Exception $e) {
            $this->assertEquals($e->getMessage(), 'Object does not have id property.');
        }
    }

    public function testGetPathDirname()
    {
        $base_name = FilesUntils::getPathDirname('path/to/file.pdf');

        $this->assertEquals($base_name, 'path/to');
    }

    public function testGetFileBasename()
    {
        $base_name = FilesUntils::getFileBasename('path/to/file.pdf');

        $this->assertEquals($base_name, 'file.pdf');
    }

    public function testGetFileExtension()
    {
        $base_name = FilesUntils::getFileExtension('path/to/file.pdf');

        $this->assertEquals($base_name, 'pdf');
    }

    public function testGetFileName()
    {
        $file_name = FilesUntils::getFileName('path/to/file.pdf');

        $this->assertEquals($file_name, 'file');
    }

    public function testHumanFilesize()
    {
        $file_size = FilesUntils::humanFilesize(0);
        $this->assertEquals($file_size, '0 B');

        $file_size = FilesUntils::humanFilesize(681);
        $this->assertEquals($file_size, '681 B');

        $file_size = FilesUntils::humanFilesize(1024);
        $this->assertEquals($file_size, '1 KB');

        $file_size = FilesUntils::humanFilesize(2097152);
        $this->assertEquals($file_size, '2 MB');

        $file_size = FilesUntils::humanFilesize(2197152, 0);
        $this->assertEquals($file_size, '2 MB');

        $file_size = FilesUntils::humanFilesize(4718592000);
        $this->assertEquals($file_size, '4.39 GB');
    }
}
