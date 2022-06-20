<?php

use Alura\Architecture\Application\EnrollStudent\EnrollStudent;
use Alura\Architecture\Application\EnrollStudent\EnrollStudentDTO;
use Alura\Architecture\Domain\EventPublisher;
use Alura\Architecture\Domain\Student\Email;
use Alura\Architecture\Domain\Student\LogStudentEnrolled;
use Alura\Architecture\Domain\Student\Student;
use Alura\Architecture\Infra\Student\StudentRepositoryInMemory;

require 'vendor/autoload.php';

$cpf = $argv[1];
$name = $argv[2];
$email = $argv[3];
$ddd = $argv[4];
$phone = $argv[5];

//$student = Student::withCpfEmailName($cpf, new Email($email), $name)->addPhone($ddd, $phone);

$publisher = new EventPublisher();
$publisher->addListener(new LogStudentEnrolled());
$useCase = new EnrollStudent(new StudentRepositoryInMemory(), $publisher);
$useCase->handle(new EnrollStudentDTO($name, $cpf, $email));
