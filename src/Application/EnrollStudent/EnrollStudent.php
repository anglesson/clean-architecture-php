<?php

namespace Alura\CleanArchitecture\Application\EnrollStudent;

use Alura\CleanArchitecture\Domain\Student\Student;
use Alura\CleanArchitecture\Domain\Student\StudentRepository;

class EnrollStudent
{
    private StudentRepository $studentRepository;

    public function __construct(StudentRepository $studentRepository)
    {
        $this->studentRepository = $studentRepository;
    }

    public function handle(EnrollStudentDTO $data): void
    {
        $student = Student::withCpfEmailName($data->cpf, $data->email, $data->name);
        $this->studentRepository->add($student);
    }
}