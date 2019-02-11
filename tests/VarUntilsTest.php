<?php
class VarUntilsTest extends \CustomPHPUnitTestCase
{
    public function testIsVariableExistsAndNotEmpty()
    {
        $var = null;
        $this->assertEquals(VarUntils::isVariableExistsAndNotEmpty($var), false);

        $var = '';
        $this->assertEquals(VarUntils::isVariableExistsAndNotEmpty($var), false);

        $var = [];
        $this->assertEquals(VarUntils::isVariableExistsAndNotEmpty($var), false);

        $var = 'a';
        $this->assertEquals(VarUntils::isVariableExistsAndNotEmpty($var), true);

        // TODO decide whether it should return a true or false
        $var = 0;
        $this->assertEquals(VarUntils::isVariableExistsAndNotEmpty($var), false);

        $var = ['a' => 1];
        $this->assertEquals(VarUntils::isVariableExistsAndNotEmpty($var), true);
    }

    public function testIsVariableNotExistsOrEmpty()
    {
        $var = null;
        $this->assertEquals(VarUntils::isVariableNotExistsOrEmpty($var), true);

        $var = '';
        $this->assertEquals(VarUntils::isVariableNotExistsOrEmpty($var), true);

        $var = [];
        $this->assertEquals(VarUntils::isVariableNotExistsOrEmpty($var), true);

        $var = 'a';
        $this->assertEquals(VarUntils::isVariableNotExistsOrEmpty($var), false);

        // TODO decide whether it should return a true or false
        $var = 0;
        $this->assertEquals(VarUntils::isVariableNotExistsOrEmpty($var), true);

        $var = ['a' => 1];
        $this->assertEquals(VarUntils::isVariableNotExistsOrEmpty($var), false);
    }
}
