<?php
class ImagickUntilsTest extends \CustomPHPUnitTestCase
{
    private $input_path = 'tests/fixtures/imagick/small_size_image.jpg';
    private $output_path = 'tests/temp/small_size_image_output.jpg';

    public function testResizeDownscale()
    {
        ImagickUntils::resize($this->input_path, $this->output_path, 300, 300);

        $this->assertEquals(file_exists($this->output_path), true);
        $this->assertEquals($this->getDimension(), ['width' => 300, 'height' => 225]);
    }

    public function testResizeUpscale()
    {
        ImagickUntils::resize($this->input_path, $this->output_path, 1000, 1000);

        $this->assertEquals(file_exists($this->output_path), true);
        $this->assertEquals($this->getDimension(), ['width' => 1000, 'height' => 750]);
    }

    public function testScaleDownscale()
    {
        ImagickUntils::scale($this->input_path, $this->output_path, 300, 300);

        $this->assertEquals(file_exists($this->output_path), true);
        $this->assertEquals($this->getDimension(), ['width' => 300, 'height' => 225]);
    }

    public function testScaleUpscale()
    {
        ImagickUntils::scale($this->input_path, $this->output_path, 1000, 1000);

        $this->assertEquals(file_exists($this->output_path), true);
        $this->assertEquals($this->getDimension(), ['width' => 1000, 'height' => 750]);
    }

    public function testResizeIfLargerUpscale()
    {
        ImagickUntils::resizeIfLarger($this->input_path, $this->output_path, 1000, 1000);

        $this->assertEquals(file_exists($this->output_path), true);
        $this->assertEquals($this->getDimension(), ['width' => 640, 'height' => 480]);
    }

    public function testResizeIfLargerUpscaleEqual()
    {
        ImagickUntils::resizeIfLarger($this->input_path, $this->output_path, 600, 480);

        $this->assertEquals(file_exists($this->output_path), true);
        $this->assertEquals($this->getDimension(), ['width' => 600, 'height' => 450]);
    }

    public function testResizeIfLargerDownscale()
    {
        ImagickUntils::resizeIfLarger($this->input_path, $this->output_path, 400, 200);

        $this->assertEquals(file_exists($this->output_path), true);
        $this->assertEquals($this->getDimension(), ['width' => 267, 'height' => 200]);
    }

    public function testScaleIfLargerUpscale()
    {
        ImagickUntils::scaleIfLarger($this->input_path, $this->output_path, 1000, 1000);

        $this->assertEquals(file_exists($this->output_path), true);
        $this->assertEquals($this->getDimension(), ['width' => 640, 'height' => 480]);
    }

    public function testScaleIfLargerUpscaleEqual()
    {
        ImagickUntils::scaleIfLarger($this->input_path, $this->output_path, 600, 480);

        $this->assertEquals(file_exists($this->output_path), true);
        $this->assertEquals($this->getDimension(), ['width' => 600, 'height' => 450]);
    }

    public function testScaleIfLargerDownscale()
    {
        ImagickUntils::scaleIfLarger($this->input_path, $this->output_path, 400, 200);

        $this->assertEquals(file_exists($this->output_path), true);
        $this->assertEquals($this->getDimension(), ['width' => 267, 'height' => 200]);
    }

    public function testCropDownscale()
    {
        ImagickUntils::crop($this->input_path, $this->output_path, 300, 300);

        $this->assertEquals(file_exists($this->output_path), true);
        $this->assertEquals($this->getDimension(), ['width' => 300, 'height' => 300]);
    }

    public function testCropUpscale()
    {
        ImagickUntils::crop($this->input_path, $this->output_path, 1000, 1000);

        $this->assertEquals(file_exists($this->output_path), true);
        $this->assertEquals($this->getDimension(), ['width' => 1000, 'height' => 1000]);
    }

    public function testCropUpscaleHorizontal()
    {
        ImagickUntils::crop($this->input_path, $this->output_path, 200, 125);

        $this->assertEquals(file_exists($this->output_path), true);
        $this->assertEquals($this->getDimension(), ['width' => 200, 'height' => 125]);
    }

    public function tearDown()
    {
        unlink($this->output_path);
    }

    private function getDimension()
    {
        return (new Imagick($this->output_path))->getImageGeometry();
    }
}
