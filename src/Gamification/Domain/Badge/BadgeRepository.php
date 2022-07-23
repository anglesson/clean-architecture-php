<?php

namespace Alura\Architecture\Gamification\Domain\Badge;

use Alura\Architecture\Shared\Domain\Cpf;

interface BadgeRepository
{
    public function add(Badge $badge): void;
    public function badgesByCpf(Cpf $cpf);
}