<?php

namespace Alura\Architecture\Application\EnrollStudent;

use Alura\Architecture\Domain\Student\Student;
use Alura\Architecture\Domain\Student\StudentRepository;

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