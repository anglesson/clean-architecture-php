<?php

namespace Alura\Architecture\Tests\Shared\Domain;

use Alura\Architecture\Shared\Domain\Cpf;
use PHPUnit\Framework\TestCase;


class CpfTest extends TestCase
{
    public function testCpfComFormatoInvalidoNaoDeveExistir()
    {
        $this->expectException(\InvalidArgumentException::class);
        new Cpf('12345678910');
    }

    public function testCpfDeveSerRepresentadoComoString()
    {
        $cpf = new Cpf('123.456.789-10');
        $this->assertSame('123.456.789-10', (string) $cpf);
    }
}