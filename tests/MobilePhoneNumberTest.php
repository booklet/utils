<?php
class MobilePhoneNumberTest extends TesterCase
{
    public $skip_database_clear_before = ['all'];

    public function testIsCellPhoneNumber()
    {
        Assert::expect(MobilePhoneNumber::isCellPhoneNumber(500123123))->to_equal(true);
        Assert::expect(MobilePhoneNumber::isCellPhoneNumber('500123123'))->to_equal(true);
        Assert::expect(MobilePhoneNumber::isCellPhoneNumber(500123))->to_equal(false);
        Assert::expect(MobilePhoneNumber::isCellPhoneNumber('500123'))->to_equal(false);
        Assert::expect(MobilePhoneNumber::isCellPhoneNumber(123456789))->to_equal(false);
        Assert::expect(MobilePhoneNumber::isCellPhoneNumber(625941209))->to_equal(false);
        Assert::expect(MobilePhoneNumber::isCellPhoneNumber(800800800))->to_equal(false);
        Assert::expect(MobilePhoneNumber::isCellPhoneNumber(883100000))->to_equal(true);
        Assert::expect(MobilePhoneNumber::isCellPhoneNumber(699060000))->to_equal(true);
    }
}
