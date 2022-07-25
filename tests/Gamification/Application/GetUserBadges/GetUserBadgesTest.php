<?php

namespace Alura\Architecture\Tests\Gamification\Application\GetUserBadges;

use Alura\Architecture\Academic\Application\EnrollStudent\EnrollStudent;
use Alura\Architecture\Academic\Application\EnrollStudent\EnrollStudentDTO;
use Alura\Architecture\Academic\Domain\Student\LogStudentEnrolled;
use Alura\Architecture\Gamification\Application\GenerateBadgeNewbie;
use Alura\Architecture\Gamification\Application\GetUserBadges\GetUserBadges;
use Alura\Architecture\Gamification\Application\GetUserBadges\GetUserBadgesDTO;
use Alura\Architecture\Gamification\Infra\BadgesInMemoryRepository;
use Alura\Architecture\Academic\Infra\Student\StudentRepositoryInMemory;
use Alura\Architecture\Shared\Domain\Cpf;
use Alura\Architecture\Shared\Domain\Event\EventPublisher;

class GetUserBadgesTest extends \PHPUnit\Framework\TestCase
{
    public function testSholdBeReturnUserBadges()
    {
        $mockData = [
            'name' => 'Anglesson Araujo',
            'cpf'  => '861.326.930-33',
            'email' => 'contato@anglesson.com.br'
        ];
        $badgeRepository = new BadgesInMemoryRepository();
        $publisher = new EventPublisher();
        $publisher->addListener(new LogStudentEnrolled());
        $publisher->addListener(new GenerateBadgeNewbie($badgeRepository));

        $useCase = new EnrollStudent(new StudentRepositoryInMemory(), $publisher);

        $useCase->handle(new EnrollStudentDTO($mockData['name'], $mockData['cpf'], $mockData['email']));

        $badges = $badgeRepository->badgesByCpf(new Cpf($mockData['cpf']));
        var_dump($badges);
        $this->assertTrue(count($badges)>0, 'No have a badge');
    }
}