<?php

namespace Arquitetura\Aplicacao\Aluno\MatricularAluno;

use Arquitetura\Dominio\Aluno\Aluno;
use Arquitetura\Dominio\Aluno\AlunoMatriculado;
use Arquitetura\Dominio\Aluno\LogDeAlunoMatriculado;
use Arquitetura\Dominio\Aluno\RepositorioDeAluno;
use Arquitetura\Dominio\PublicadorDeEvento;

class MatricularAluno
{
    private RepositorioDeAluno $repositorioDeAluno;
    private PublicadorDeEvento $publicador;

    public function __construct(RepositorioDeAluno $repositorioDeAluno, PublicadorDeEvento $publicador)
    {
        $this->repositorioDeAluno = $repositorioDeAluno;
        $this->publicador = $publicador;
    }

    public function executa(MatricularAlunoDto $dados): void
    {
        $aluno = Aluno::comCpfNomeEEmail($dados->cpfAluno, $dados->nomeAluno, $dados->emailAluno);
        $this->repositorioDeAluno->adicionar($aluno);

        $evento = new AlunoMatriculado($aluno->cpf());
        $this->publicador->publicar($evento);
    }
}
