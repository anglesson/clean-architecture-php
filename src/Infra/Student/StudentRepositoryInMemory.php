<?php

class StudentRepositoryInMemory implements \Alura\CleanArchitecture\Domain\Student\StudentRepository
{
    private array $students = [];

    public function add(\Alura\CleanArchitecture\Domain\Student\Student $student): void
    {
        $this->students[] = $student;
    }

    public function findByCpf(\Alura\CleanArchitecture\Domain\Student\Cpf $cpf): \Alura\CleanArchitecture\Domain\Student\Student
    {
        $filteredStudents = array_filter(
            $this->students,
            fn(Student $student) => $student->cpf() == $cpf
        );

        if ( count($filteredStudents) === 0) {
            throw new \Alura\CleanArchitecture\Domain\Student\StudentNotFound('Student not found');
        }

        if ( count($filteredStudents) > 1) {
            throw new \Alura\CleanArchitecture\Domain\Student\StudentNotFound('Fodeu!');
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