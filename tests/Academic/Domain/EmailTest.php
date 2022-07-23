<?php

namespace Alura\Architecture\Domain\Tests\Domain;

use Alura\Architecture\Academic\Domain\Student\Email;
use PHPUnit\Framework\TestCase;

class EmailTest extends TestCase
{
    public function testPhoneHasBeenAString()
    {
        self::expectException(\InvalidArgumentException::class);
        self::expectDeprecationMessage('Email Address is invalid');
        new Email('invali@email');
    }
}