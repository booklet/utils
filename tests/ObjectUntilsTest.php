<?php
class ObjectUntilsTest extends \CustomPHPUnitTestCase
{
    public function objectForTest()
    {
        $obj = new stdClass();
        $obj->attrib1 = 'value1';
        $obj->attrib2 = 'value2';

        return $obj;
    }

    public function testMysqlParameters()
    {
        $obj = $this->objectForTest();

        $parameters = ObjectUntils::mysqlParameters($obj);
        $this->assertEquals($parameters, '`attrib1`, `attrib2`');

        $parameters = ObjectUntils::mysqlParameters([]);
        $this->assertEquals($parameters, false);
    }

    public function testMysqlParametersUpdate()
    {
        $obj = $this->objectForTest();

        $parameters = ObjectUntils::mysqlParametersUpdate($obj);
        $this->assertEquals($parameters, '`attrib1`=?, `attrib2`=?');

        $parameters = ObjectUntils::mysqlParametersUpdate([]);
        $this->assertEquals($parameters, false);
    }

    public function testMysqlParametersValuesArray()
    {
        $obj = $this->objectForTest();

        $values = ObjectUntils::mysqlParametersValuesArray($obj);
        $this->assertEquals($values, ['value1', 'value2']);

        $values = ObjectUntils::mysqlParametersValuesArray([]);
        $this->assertEquals($values, false);
    }

    public function testMysqlParametersValues()
    {
        $obj = $this->objectForTest();

        $values = ObjectUntils::mysqlParametersValues($obj);
        $this->assertEquals($values, 'value1, value2');

        $values = ObjectUntils::mysqlParametersValues([]);
        $this->assertEquals($values, false);
    }

    public function testMysqlParametersValuesPlaceholder()
    {
        $obj = $this->objectForTest();

        $values = ObjectUntils::mysqlParametersValuesPlaceholder($obj);
        $this->assertEquals($values, '?, ?');

        $values = ObjectUntils::mysqlParametersValuesPlaceholder([]);
        $this->assertEquals($values, false);
    }

    public function testObjToArray()
    {
        $obj = $this->objectForTest();

        $values = ObjectUntils::objToArray($obj);
        $this->assertEquals($values, ['attrib1' => 'value1', 'attrib2' => 'value2']);

        $values = ObjectUntils::objToArray(['attr1' => 'val1', 'attr2' => 'val2']);
        $this->assertEquals($values, ['attr1' => 'val1', 'attr2' => 'val2']);

        $values = ObjectUntils::objToArray('wrong_params');
        $this->assertEquals($values, false);
    }
}
