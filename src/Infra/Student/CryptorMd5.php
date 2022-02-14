<?php

class CryptorMd5 implements \Alura\CleanArchitecture\Domain\Student\Crytor
{

    public function encrypt(string $password): string
    {
        return md5($password);
    }

    public function check(string $textPassword, string $encriptedPassword): bool
    {
        return md5($textPassword) === $encriptedPassword;
    }
}