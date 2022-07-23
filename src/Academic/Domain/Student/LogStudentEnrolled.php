<?php

namespace Alura\Architecture\Academic\Domain\Student;

use Alura\Architecture\Academic\Domain\Event;
use Alura\Architecture\Academic\Domain\EventListener;

class LogStudentEnrolled extends EventListener
{
    /**
     * @param StudentEnrolled $studentEnrolled
     */
    public function reactTo(Event $studentEnrolled): void
    {
        fprintf(
            STDERR,
            'Aluno com CPF %s foi matriculado na data %s',
            $studentEnrolled->cpfAluno(),
            $studentEnrolled->moment()->format('d/m/Y'),
        );
    }

    public function knowProcess(Event $event): bool
    {
        return $event instanceof StudentEnrolled;
    }
}