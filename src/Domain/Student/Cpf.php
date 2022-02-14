<?php

namespace Alura\CleanArchitecture\Domain\Student;

class Cpf
{
    private string $number;
    public function __construct($number)
    {
        $this->setNumber($number);
    }

    private function setNumber($number)
    {
        $options = [
            'options' => [
                'regex' => '/\d{3}\.\d{3}\.\d{3}\-\d{2}/'
            ]
        ];
        if ( !filter_var($number, FILTER_VALIDATE_REGEXP, $options) )
        {
            throw new \http\Exception\InvalidArgumentException('Cpf is invalid');
        }

        $this->number = $number;
    }

    public function __toString()
    {
        return $this->number;
    }
}