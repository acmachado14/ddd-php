<?php

namespace Arquitetura\Gamificacao\Infra\Selo;

use Arquitetura\Academico\Dominio\Cpf;
use Arquitetura\Gamificacao\Dominio\Selo\RepositorioDeSelo;
use Arquitetura\Gamificacao\Dominio\Selo\Selo;

class RepositorioDeSeloEmMemoria implements RepositorioDeSelo
{
    private array $selos = [];

    public function adiciona(Selo $selo): void
    {
        $this->selos[] = $selo;
    }

    public function selosDeAlunoComCpf(Cpf $cpf)
    {
        return array_filter($this->selos, fn (Selo $selo) => $selo->cpfAluno() == $cpf);
    }
}
