<?php

namespace Alura\Architecture\Academic\Domain\Student;

class Email
{
    private string $address;

    public function __construct(string $address)
    {
        if ( !filter_var($address, FILTER_VALIDATE_EMAIL) ) {
            throw new \InvalidArgumentException('Email Address is invalid');
        }

        $this->address = $address;
    }

    public function __toString()
    {
        return $this->address;
    }
}