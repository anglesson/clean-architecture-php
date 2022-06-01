<?php

namespace Alura\Architecture\Domain\Student;

interface StudentRepository
{
    public function add(Student $student): void;
    public function findByCpf(Cpf $cpf): Student;
    /** @return Student[] */
    public function all(): array;
}