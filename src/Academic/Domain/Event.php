<?php

namespace Alura\Architecture\Domain;

interface Event
{
    public function moment(): \DateTimeImmutable;
}