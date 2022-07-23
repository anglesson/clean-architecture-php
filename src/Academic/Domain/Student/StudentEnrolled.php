<?php

namespace Alura\Architecture\Academic\Domain\Student;

use Alura\Architecture\Academic\Domain\Event;
use Alura\Architecture\Shared\Domain\Cpf;

class StudentEnrolled implements Event
{
    private \DateTimeImmutable $moment;
    private Cpf $cpfAluno;

    public function __construct(Cpf $cpf)
    {
        $this->moment = new \DateTimeImmutable();
        $this->cpfAluno = $cpf;
    }

    public function cpfAluno(): Cpf
    {
        return $this->cpfAluno;
    }

    public function moment(): \DateTimeImmutable
    {
        return $this->moment;
    }
}