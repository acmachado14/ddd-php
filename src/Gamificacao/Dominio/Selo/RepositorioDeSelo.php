<?php

namespace Arquitetura\Gamificacao\Dominio\Selo;

use Arquitetura\Dominio\Cpf;

interface RepositorioDeSelo
{
    public function adiciona(Selo $selo): void;
    public function selosDeAlunoComCpf(Cpf $cpf);
}
