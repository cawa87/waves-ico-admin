<?php


namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\User;

class LoadUserData implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $user = new User();
        $user->setUsername('admin');
        $user->setPlainPassword('test');
        $user->setEmail('test@mail.com');
        $user->setFirstName('Test');
        $user->setLastName('Testing');
        $user->setEnabled(1);

        $manager->persist($user);



        $manager->flush();
    }
}