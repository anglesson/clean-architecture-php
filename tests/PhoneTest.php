<?php

namespace Alura\Architecture\Tests;

use Alura\Architecture\Domain\Student\Phone;
use PHPUnit\Framework\TestCase;

class PhoneTest extends TestCase
{
    public function testPhoneHasBeenAString()
    {
        $phone = new Phone('24', '123456789');
        self::assertSame('(24) 123456789', (string) $phone);
    }

    public function testPhoneNotHasBeenWithInvalidDDD()
    {
        $this->expectException(\InvalidArgumentException::class);
        self::expectDeprecationMessage('DDD is invalid');
        new Phone('ddd', '123456789');
    }
}