<?php

class StudentRepositoryInMemory implements \Alura\Architecture\Domain\Student\StudentRepository
{
    private array $students = [];

    public function add(\Alura\Architecture\Domain\Student\Student $student): void
    {
        $this->students[] = $student;
    }

    public function findByCpf(\Alura\Architecture\Domain\Student\Cpf $cpf): \Alura\Architecture\Domain\Student\Student
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