<?php

namespace Alura\Architecture\Academic\Domain\Student;

class Phone
{
    private string $ddd;
    private string $number;

    public function __construct(string $ddd, string $number)
    {
        $this->setDdd($ddd);
        $this->setNumber($number);
    }

    /**
     * @param string $ddd
     */
    public function setDdd(string $ddd): void
    {
        if (preg_match('/\d{2}/', $ddd) !== 1)
        {
            throw new \InvalidArgumentException('DDD is invalid');
        }

        $this->ddd = $ddd;
    }

    /**
     * @param string $number
     */
    public function setNumber(string $number): void
    {
        if ( preg_match('/\d{8,9}/', $number) != 1 ) {
            throw new \InvalidArgumentException('Phone number is invalid');
        }

        $this->number = $number;
    }

    public function __toString()
    {
        return "({$this->ddd}) {$this->number}";
    }
}