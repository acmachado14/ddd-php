<?php

namespace Arquitetura\Dominio\Aluno;

use Arquitetura\Dominio\Cpf;

class AlunoNaoEncontrado extends \DomainException
{
    public function __construct(Cpf $cpf)
    {
        parent::__construct("Aluno com CPF $cpf não encontrado");
    }
}
