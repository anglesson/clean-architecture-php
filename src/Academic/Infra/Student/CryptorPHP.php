<?php

use Alura\Architecture\Academic\Domain\Student\Crytor;

class CryptorPHP implements Crytor
{

    public function encrypt(string $password): string
    {
        return password_hash($password, PASSWORD_ARGON2ID);
    }

    public function check(string $textPassword, string $encriptedPassword): bool
    {
        return password_verify($textPassword, $encriptedPassword);
    }
}