<?php

class CryptorPHP implements \Alura\Architecture\Domain\Student\Crytor
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