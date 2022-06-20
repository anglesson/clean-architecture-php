<?php

namespace Alura\Architecture\Domain\Badge;

use Alura\Architecture\Domain\Student\Cpf;

interface BadgeRepository
{
    public function add(Badge $badge): void;
    public function badgesByCpf(Cpf $cpf);
}