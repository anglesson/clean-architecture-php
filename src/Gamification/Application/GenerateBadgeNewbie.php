<?php

namespace Alura\Architecture\Gamification\Application;

use Alura\Architecture\Gamification\Domain\Badge\Badge;
use Alura\Architecture\Gamification\Domain\Badge\BadgeRepository;
use Alura\Architecture\Shared\Domain\Cpf;
use Alura\Architecture\Shared\Domain\Event\Event;
use Alura\Architecture\Shared\Domain\Event\EventListener;

class GenerateBadgeNewbie extends EventListener
{
    private BadgeRepository $badgeRepository;

    public function __construct(BadgeRepository $badgeRepository)
    {
        $this->badgeRepository = $badgeRepository;
    }

    public function knowProcess(Event $event): bool
    {
        // TODO Mudar para uma classe enum
        return get_class($event) === 'Alura\Architecture\Academic\Domain\Student\StudentEnrolled';
    }

    public function reactTo(Event $event): void
    {
        $array = $event->jsonSerialize();
        $cpf = $array['cpfAluno'];
        $this->badgeRepository->add(new Badge($cpf, 'Newbie'));
    }
}