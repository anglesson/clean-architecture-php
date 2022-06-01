<?php

namespace Alura\Architecture\Domain\Student;

class Student
{
    private Cpf $cpf;
    private string $name;
    private Email $email;
    private Phone $phones;

    public function __construct(Cpf $cpf, string $name, Email $email)
    {
        $this->cpf = $cpf;
        $this->name = $name;
        $this->email = $email;
    }

    public static function withCpfEmailName(string $cpf, string $email, string $name): self
    {
        return new Student(new Cpf($cpf), $name, new Email($email));
    }

    public function addPhone(string $ddd, string $number): self
    {
        $this->phones[] = new Phone($ddd, $number);
        return $this;
    }
}