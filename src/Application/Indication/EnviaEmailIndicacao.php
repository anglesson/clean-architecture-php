<?php

namespace Alura\Architecture\Application\Indication;

use Alura\Architecture\Domain\Student\Student;

interface EnviaEmailIndicacao
{
    public function sendTo(Student $studentIndicated): void;
}