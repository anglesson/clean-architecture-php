<?php

namespace Alura\Architecture\Gamification\Application\GetUserBadges;

class GetUserBadgesDTO
{
    public string $cpf;

    /**
     * @param string $cpf
     */
    public function __construct(string $cpf)
    {
        $this->cpf = $cpf;
    }
}