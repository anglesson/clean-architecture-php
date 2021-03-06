<?php

namespace Alura\Architecture\Tests\Application\Student;

use Alura\Architecture\Academic\Application\EnrollStudent\EnrollStudent;
use Alura\Architecture\Academic\Application\EnrollStudent\EnrollStudentDTO;
use Alura\Architecture\Infra\Student\StudentRepositoryInMemory;
use Alura\Architecture\Shared\Domain\Cpf;
use PHPUnit\Framework\TestCase;

class EnrollStudentTest extends TestCase
{
    public function testStudentShouldBeAddedToRepository()
    {
        $dataStudent = new EnrollStudentDTO(
            'Name Student',
            '123.456.789-10',
            'email@email.com',
        );
        $studentRepository = new StudentRepositoryInMemory();
        $useCase = new EnrollStudent($studentRepository);
        $useCase->handle($dataStudent);

        $student = $studentRepository->findByCpf(new Cpf('123.456.789-10'));
        $this->assertSame('Name Student', $student->name());
        $this->assertSame('email@email.com', (string) $student->email());
        $this->assertEmpty($student->phones());
    }
}