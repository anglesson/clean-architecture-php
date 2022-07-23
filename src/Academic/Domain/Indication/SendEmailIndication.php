<?php

namespace Alura\Architecture\Academic\Application\Indication;

use Alura\Architecture\Academic\Domain\Student\Student;

interface SendEmailIndication
{
    public function sendTo(Student $studentIndicated): void;
}