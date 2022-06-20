<?php

namespace Alura\Architecture\Domain\Badge;

use Alura\Architecture\Domain\Student\Cpf;

class Badge
{
    private Cpf $cpfStudent;
    private string $name;

    /**
     * @param Cpf $cpf
     * @param string $name
     */
    public function __construct(Cpf $cpf, string $name)
    {
        $this->cpfStudent = $cpf;
        $this->name = $name;
    }

    public function cpf(): Cpf
    {
        return $this->cpfStudent;
    }

    public function __toString(): string
    {
        return $this->name;
    }

}