<?php

namespace Alura\Architecture\Domain\Indication;

use Alura\Architecture\Domain\Student\Student;

class Indication
{
    private Student $indicator;
    private Student $indicated;
    private \DateTimeImmutable $date;

    public function __construct(Student $indicator, Student $indicated)
    {
        $this->indicator = $indicator;
        $this->indicated = $indicated;

        $this->date = new \DateTimeImmutable();
    }


}