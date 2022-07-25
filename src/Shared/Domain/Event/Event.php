<?php

namespace Alura\Architecture\Shared\Domain\Event;

use JsonSerializable;

interface Event extends JsonSerializable
{
    public function moment(): \DateTimeImmutable;
}