<?php

namespace Alura\Architecture\Domain\Indication;

class SendEmailIndicationPHPMail implements \Alura\Architecture\Application\Indication\EnviaEmailIndicacao
{
    public function sendTo(\Alura\Architecture\Domain\Student\Student $studentIndicated): void
    {
        $subject = "Indication";
        $message = "Congratulations! You're indicated!";
        mail($studentIndicated->getEmail(), $subject, $message);
    }
}