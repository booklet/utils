<?php
class JsonUntilsTest extends \CustomPHPUnitTestCase
{
    public function testFnIsJSON()
    {
        $is_json = JsonUntils::isJSON('{"key":"val"}');
        $this->assertEquals($is_json, true);

        $is_json = JsonUntils::isJSON('[{"key":"val"}]');
        $this->assertEquals($is_json, true);

        $is_json = JsonUntils::isJSON('{"key":');
        $this->assertEquals($is_json, false);

        $is_json = JsonUntils::isJSON('var1=one&var2=two');
        $this->assertEquals($is_json, false);
    }
}
