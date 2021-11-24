<?php

use Arquitetura\Aplicacao\Aluno\MatricularAluno\MatricularAluno;
use Arquitetura\Aplicacao\Aluno\MatricularAluno\MatricularAlunoDto;
use Arquitetura\Dominio\Aluno\Aluno;
use Arquitetura\Dominio\Aluno\LogDeAlunoMatriculado;
use Arquitetura\Dominio\PublicadorDeEvento;
use Arquitetura\Infra\Aluno\RepositorioDeAlunoEmMemoria;

require 'vendor/autoload.php';

$cpf = $argv[1];
$nome = $argv[2];
$email = $argv[3];
$ddd = $argv[4];
$numero = $argv[5];

$publicador = new PublicadorDeEvento();
$publicador->adicionarOuvinte(new LogDeAlunoMatriculado());

$useCase = new MatricularAluno(new RepositorioDeAlunoEmMemoria(), $publicador);

$useCase->executa(new MatricularAlunoDto($cpf, $nome, $email));
