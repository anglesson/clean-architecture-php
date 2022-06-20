<?php

namespace Alura\Architecture\Gamification\Infra;

use Alura\Architecture\Domain\Badge\Badge;
use Alura\Architecture\Domain\Badge\BadgeRepository;
use Alura\Architecture\Domain\Student\Cpf;

class BadgesInMemoryRepository implements BadgeRepository
{
    private array $badges = [];

    public function add(Badge $badge): void
    {
        $this->badges[] = $badge;
    }

    public function badgesByCpf(Cpf $cpf): array
    {
        return array_filter($this->badges, fn (Badge $badge) => $badge->cpf() === $cpf);
    }
}