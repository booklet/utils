<?php
class CodeGeneratorTest extends TesterCase
{
    public $skip_database_clear_before = ['all'];

    public function testGenerate()
    {
        $code = (new CodeGenerator())->generate();

        Assert::expect(strlen($code))->to_equal(8);
    }

    public function testGenerateMultiple()
    {
        $codes = (new CodeGenerator())->generateMultiple(10);

        Assert::expect(count($codes))->to_equal(10);
        Assert::expect(strlen($codes[0]))->to_equal(8);
        Assert::expect(strlen($codes[9]))->to_equal(8);
    }

    public function testGenerateWidthParams()
    {
        $params = ['lenght' => 100];
        $code = (new CodeGenerator($params))->generate();
        Assert::expect(strlen($code))->to_equal(100);

        $params = ['prefix' => 'PREFIX-'];
        $code = (new CodeGenerator($params))->generate();
        Assert::expect(StringUntils::areStartsWith($code, 'PREFIX-'))->to_equal(true);

        $params = ['suffix' => '-SUFFIX'];
        $code = (new CodeGenerator($params))->generate();
        Assert::expect(StringUntils::areEndsWith($code, '-SUFFIX'))->to_equal(true);

        $params = ['lenght' => 100, 'numbers' => true, 'letters' => false, 'symbols' => false, 'lower_and_uppercase' => false];
        $code = (new CodeGenerator($params))->generate();
        Assert::expect(StringUntils::isContainsNumbers($code))->to_equal(true);
        Assert::expect(StringUntils::isContainsLetters($code))->to_equal(false);

        $params = ['lenght' => 100, 'numbers' => false, 'letters' => true, 'symbols' => false, 'lower_and_uppercase' => false];
        $code = (new CodeGenerator($params))->generate();
        Assert::expect(StringUntils::isContainsNumbers($code))->to_equal(false);
        Assert::expect(StringUntils::isContainsLetters($code))->to_equal(true);
    }
}
