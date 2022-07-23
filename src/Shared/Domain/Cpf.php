<?php

namespace Alura\Architecture\Shared\Domain;

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
                'regexp' => '/\d{3}\.\d{3}\.\d{3}\-\d{2}/'
            ]
        ];
        if ( !filter_var($number, FILTER_VALIDATE_REGEXP, $options) )
        {
            throw new \InvalidArgumentException('Cpf is invalid');
        }

        $this->number = $number;
    }

    public function __toString()
    {
        return $this->number;
    }
}