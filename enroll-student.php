<?php

use Alura\Architecture\Academic\Application\EnrollStudent\EnrollStudent;
use Alura\Architecture\Academic\Application\EnrollStudent\EnrollStudentDTO;
use Alura\Architecture\Academic\Domain\Student\LogStudentEnrolled;
use Alura\Architecture\Gamification\Application\GenerateBadgeNewbie;
use Alura\Architecture\Gamification\Infra\BadgesInMemoryRepository;
use Alura\Architecture\Infra\Student\StudentRepositoryInMemory;
use Alura\Architecture\Shared\Domain\Event\EventPublisher;

require 'vendor/autoload.php';

$cpf = $argv[1];
$name = $argv[2];
$email = $argv[3];
$ddd = $argv[4];
$phone = $argv[5];

//$student = Student::withCpfEmailName($cpf, new Email($email), $name)->addPhone($ddd, $phone);

$publisher = new EventPublisher();
$publisher->addListener(new LogStudentEnrolled());
$publisher->addListener(new GenerateBadgeNewbie(new BadgesInMemoryRepository()));

$useCase = new EnrollStudent(new StudentRepositoryInMemory(), $publisher);

$useCase->handle(new EnrollStudentDTO($name, $cpf, $email));
