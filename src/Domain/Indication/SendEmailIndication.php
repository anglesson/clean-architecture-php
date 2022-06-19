<?php

namespace Alura\Architecture\Application\Indication;

use Alura\Architecture\Domain\Student\Student;

interface SendEmailIndication
{
    public function sendTo(Student $studentIndicated): void;
}