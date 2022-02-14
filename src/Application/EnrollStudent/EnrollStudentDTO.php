<?php

namespace Alura\CleanArchitecture\Application\EnrollStudent;

class EnrollStudentDTO
{
    public string $name;
    public string $cpf;
    public string $email;

    public function __construct(string $name, string $cpf, string $email)
    {
        $this->name = $name;
        $this->cpf = $cpf;
        $this->email = $email;
    }
}