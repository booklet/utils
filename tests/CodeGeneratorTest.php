<?php
class CodeGeneratorTest extends \CustomPHPUnitTestCase
{
    public function testGenerate()
    {
        $code = (new CodeGenerator())->generate();

        $this->assertEquals(strlen($code), 8);
    }

    public function testGenerateMultiple()
    {
        $codes = (new CodeGenerator())->generateMultiple(10);

        $this->assertEquals(count($codes), 10);
        $this->assertEquals(strlen($codes[0]), 8);
        $this->assertEquals(strlen($codes[9]), 8);
    }

    public function testGenerateWidthParams()
    {
        $params = ['lenght' => 100];
        $code = (new CodeGenerator($params))->generate();
        $this->assertEquals(strlen($code), 100);

        $params = ['prefix' => 'PREFIX-'];
        $code = (new CodeGenerator($params))->generate();
        $this->assertEquals(StringUntils::areStartsWith($code, 'PREFIX-'), true);

        $params = ['suffix' => '-SUFFIX'];
        $code = (new CodeGenerator($params))->generate();
        $this->assertEquals(StringUntils::areEndsWith($code, '-SUFFIX'), true);

        $params = ['lenght' => 100, 'numbers' => true, 'letters' => false, 'symbols' => false, 'lower_and_uppercase' => false];
        $code = (new CodeGenerator($params))->generate();
        $this->assertEquals(StringUntils::isContainsNumbers($code), true);
        $this->assertEquals(StringUntils::isContainsLetters($code), false);

        $params = ['lenght' => 100, 'numbers' => false, 'letters' => true, 'symbols' => false, 'lower_and_uppercase' => false];
        $code = (new CodeGenerator($params))->generate();
        $this->assertEquals(StringUntils::isContainsNumbers($code), false);
        $this->assertEquals(StringUntils::isContainsLetters($code), true);
    }
}
