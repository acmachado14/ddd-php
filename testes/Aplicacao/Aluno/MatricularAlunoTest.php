<?php

namespace Arquitetura\Testes\Aplicacao\Aluno;

use Arquitetura\Aplicacao\Aluno\MatricularAluno\MatricularAluno;
use Arquitetura\Aplicacao\Aluno\MatricularAluno\MatricularAlunoDto;
use Arquitetura\Dominio\Aluno\Aluno;
use Arquitetura\Dominio\Cpf;
use Arquitetura\Infra\Aluno\RepositorioDeAlunoEmMemoria;
use PHPUnit\Framework\TestCase;

class MatricularAlunoTest extends TestCase
{
    public function testAlunoDeveSerAdicionadoAoRepositorio()
    {
        $dadosAluno = new MatricularAlunoDto(
            '123.456.789-10',
            'Teste',
            'email@example.com',
        );
        $repositorioDeAluno = new RepositorioDeAlunoEmMemoria();
        $useCase = new MatricularAluno($repositorioDeAluno);

        $useCase->executa($dadosAluno);

        $aluno = $repositorioDeAluno->buscarPorCpf(new Cpf('123.456.789-10'));
        $this->assertSame('Teste', (string) $aluno->nome());
        $this->assertSame('email@example.com', (string) $aluno->email());
        $this->assertEmpty($aluno->telefones());
    }
}
