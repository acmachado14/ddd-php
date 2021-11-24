<?php

namespace Arquitetura\Dominio\Aluno;

use Arquitetura\Dominio\Cpf;

interface RepositorioDeAluno
{
    public function adicionar(Aluno $aluno): void;
    public function buscarPorCpf(Cpf $cpf): Aluno;
    /** @return Aluno[] */
    public function buscarTodos(): array;
}
