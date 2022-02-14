<?php

namespace Alura\CleanArchitecture\Domain\Student;

interface Crytor
{
    public function encrypt(string $password): string;
    public function check(string $textPassword, string $encriptedPassword): bool;
}