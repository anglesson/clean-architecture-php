<?php

namespace Alura\Architecture\Infra\Student;

use Alura\Architecture\Domain\Student\Cpf;
use Alura\Architecture\Domain\Student\Student;
use Alura\Architecture\Domain\Student\StudentRepository;

class StudentRepositoryInMemory implements StudentRepository
{
    private array $students = [];

    public function add(Student $student): void
    {
        $this->students[] = $student;
    }

    public function findByCpf(Cpf $cpf): Student
    {
        $filteredStudents = array_filter(
            $this->students,
            fn(Student $student) => $student->cpf() == $cpf
        );

        if ( count($filteredStudents) === 0) {
            throw new \Alura\Architecture\Domain\Student\StudentNotFound('Student not found');
        }

        if ( count($filteredStudents) > 1) {
            throw new \Alura\Architecture\Domain\Student\StudentNotFound('Fodeu!');
        }

        return $filteredStudents[0];

    }

    /**
     * @inheritDoc
     */
    public function all(): array
    {
        return $this->students;
    }
}