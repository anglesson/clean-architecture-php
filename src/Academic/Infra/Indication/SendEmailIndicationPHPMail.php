<?php

namespace Alura\Architecture\Academic\Infra\Indication;

use Alura\Architecture\Academic\Application\Indication\SendEmailIndication;
use Alura\Architecture\Academic\Domain\Student\Student;

class SendEmailIndicationPHPMail implements SendEmailIndication
{
    public function sendTo(Student $studentIndicated): void
    {
        $subject = "Indication";
        $message = "Congratulations! You're indicated!";
        mail($studentIndicated->email(), $subject, $message);
    }
}