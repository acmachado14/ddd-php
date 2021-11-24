<?php

namespace Arquitetura\Academico\Dominio;

interface Evento
{
    public function momento(): \DateTimeImmutable;
}
