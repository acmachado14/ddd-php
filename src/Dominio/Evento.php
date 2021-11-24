<?php

namespace Arquitetura\Dominio;

interface Evento
{
    public function momento(): \DateTimeImmutable;
}
