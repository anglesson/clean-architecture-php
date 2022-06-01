<?php

namespace Alura\Architecture\Tests;

use Alura\Architecture\Domain\Student\Email;
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