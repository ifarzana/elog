<?php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\User;

/**
 * Class LoadUserData
 * @package AppBundle\DataFixtures\ORM
 */
class LoadUserData implements FixtureInterface
{
    /**
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $users = [
            'Israt' => 'israt@email.co.uk',
            'Blogg' => 'blogg@email.co.uk',
            'Kyle' => 'kyle@email.co.uk',
        ];

        foreach ($users as $userName => $userEmail) {
            $user = new User();
            $user->setName($userName);
            $user->setEmail($userEmail);

            $manager->persist($user);
        }

        $manager->flush();
    }
}