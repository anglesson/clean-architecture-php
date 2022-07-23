<?php

namespace Alura\Architecture\Academic\Domain;

interface Event
{
    public function moment(): \DateTimeImmutable;
}