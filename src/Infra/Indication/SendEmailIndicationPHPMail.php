<?php

namespace Alura\Architecture\Infra\Indication;

class SendEmailIndicationPHPMail implements \Alura\Architecture\Application\Indication\SendEmailIndication
{
    public function sendTo(\Alura\Architecture\Domain\Student\Student $studentIndicated): void
    {
        $subject = "Indication";
        $message = "Congratulations! You're indicated!";
        mail($studentIndicated->getEmail(), $subject, $message);
    }
}