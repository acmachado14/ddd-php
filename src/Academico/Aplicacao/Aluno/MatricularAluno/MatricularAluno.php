<?php

namespace Arquitetura\Academico\Aplicacao\Aluno\MatricularAluno;

use Arquitetura\Academico\Dominio\Aluno\Aluno;
use Arquitetura\Academico\Dominio\Aluno\AlunoMatriculado;
use Arquitetura\Academico\Dominio\Aluno\RepositorioDeAluno;
use Arquitetura\Academico\Dominio\PublicadorDeEvento;

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
