<?php

namespace Alura\Architecture\Gamification\Application\GetUserBadges;

use Alura\Architecture\Gamification\Domain\Badge\BadgeRepository;
use Alura\Architecture\Shared\Domain\Cpf;

class GetUserBadges
{
    private BadgeRepository $badgeRepository;

    public function __construct(BadgeRepository $badgeRepository)
    {
        $this->badgeRepository = $badgeRepository;
    }

    public function handle(GetUserBadgesDTO $data)
    {
        $cpf = new Cpf($data->cpf);
        return $this->badgeRepository->badgesByCpf($cpf);
    }
}