<?php

namespace Alura\Architecture\Academic\Domain\Student;

use Alura\Architecture\Shared\Domain\Cpf;
use Alura\Architecture\Shared\Domain\Event\Event;

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

    public function jsonSerialize(): array
    {
        return get_object_vars($this);
    }
}