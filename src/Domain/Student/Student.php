<?php

namespace Alura\Architecture\Domain\Student;

class Student
{
    private Cpf $cpf;
    private string $name;
    private Email $email;
    private array $phones;
    private string $password;

    public function __construct(Cpf $cpf, string $name, Email $email)
    {
        $this->cpf = $cpf;
        $this->name = $name;
        $this->email = $email;
        $this->phones = [];
    }

    public static function withCpfEmailName(string $cpf, string $email, string $name): self
    {
        return new Student(new Cpf($cpf), $name, new Email($email));
    }

    public function addPhone(string $ddd, string $number): self
    {
        if (count($this->phones) === 2) {
            throw new StudentShouldNotHaveMoreThan2Phones('O aluno já possui 2 telefones. Não pode adicionar outro.');
        }
        $this->phones[] = new Phone($ddd, $number);
        return $this;
    }

    /**
     * @return Email
     */
    public function email(): Email
    {
        return $this->email;
    }

    public function phones(): array
    {
        return $this->phones;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function cpf(): Cpf
    {
        return $this->cpf;
    }
}