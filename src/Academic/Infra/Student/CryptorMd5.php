<?php

use Alura\Architecture\Academic\Domain\Student\Crytor;

class CryptorMd5 implements Crytor
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