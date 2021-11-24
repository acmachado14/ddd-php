<?php

namespace Arquitetura\Aplicacao\Indicacao;

use Arquitetura\Dominio\Aluno\Aluno;

interface EnviaEmailIndicacao
{
    public function enviaPara(Aluno $alunoIndicado): void;
}
