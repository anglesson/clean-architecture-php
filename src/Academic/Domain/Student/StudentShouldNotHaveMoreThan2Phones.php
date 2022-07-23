<?php

namespace Alura\Architecture\Academic\Domain\Student;

class StudentShouldNotHaveMoreThan2Phones extends \DomainException
{
    public function __construct($message = "", $code = 0, \Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}