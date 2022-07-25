<?php

namespace Alura\Architecture\Academic\Application\EnrollStudent;

use Alura\Architecture\Shared\Domain\Event\EventPublisher;
use Alura\Architecture\Academic\Domain\Student\Student;
use Alura\Architecture\Academic\Domain\Student\StudentEnrolled;
use Alura\Architecture\Academic\Domain\Student\StudentRepository;

class EnrollStudent
{
    private StudentRepository $studentRepository;
    private EventPublisher $publisher;

    public function __construct(StudentRepository $studentRepository, EventPublisher $publisher)
    {
        $this->studentRepository = $studentRepository;
        $this->publisher = $publisher;
    }

    public function handle(EnrollStudentDTO $data): void
    {
        $student = Student::withCpfEmailName($data->cpf, $data->email, $data->name);
        $this->studentRepository->add($student);

        $event = new StudentEnrolled($student->cpf());
        $this->publisher->publish($event);
    }
}