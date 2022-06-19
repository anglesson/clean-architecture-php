<?php

use Alura\Architecture\Domain\Student\Email;
use Alura\Architecture\Domain\Student\Student;

require 'vendor/autoload.php';

$cpf = $argv[1];
$name = $argv[2];
$email = $argv[3];
$ddd = $argv[4];
$phone = $argv[5];

$student = Student::withCpfEmailName($cpf, new Email($email), $name)->addPhone($ddd, $phone);