<?php
class MobilePhoneNumberTest extends \CustomPHPUnitTestCase
{
    public function testIsCellPhoneNumber()
    {
        $this->assertEquals(MobilePhoneNumber::isCellPhoneNumber(500123123), true);
        $this->assertEquals(MobilePhoneNumber::isCellPhoneNumber('500123123'), true);
        $this->assertEquals(MobilePhoneNumber::isCellPhoneNumber(500123), false);
        $this->assertEquals(MobilePhoneNumber::isCellPhoneNumber('500123'), false);
        $this->assertEquals(MobilePhoneNumber::isCellPhoneNumber(123456789), false);
        $this->assertEquals(MobilePhoneNumber::isCellPhoneNumber(625941209), false);
        $this->assertEquals(MobilePhoneNumber::isCellPhoneNumber(800800800), false);
        $this->assertEquals(MobilePhoneNumber::isCellPhoneNumber(883100000), true);
        $this->assertEquals(MobilePhoneNumber::isCellPhoneNumber(699060000), true);
    }
}
