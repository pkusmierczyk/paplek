<?php
/**
 * Created by PhpStorm.
 * User: piotr
 * Date: 14.03.14
 * Time: 19:19
 */

namespace Hanky\PaplekBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Hanky\PaplekBundle\Entity\User;

class LoadUserData extends AbstractFixture implements OrderedFixtureInterface {
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $userAdmin = new User();
        $userAdmin->setLogin('piotr');
        $userAdmin->setPasswd('test123');
        $userAdmin->setEmail('kusmierczyk.p@gmail.com');

        $user = new User();
        $user->setLogin('hank');
        $user->setPasswd('test123');
        $user->setEmail('h90hogan@gmail.com');


        $manager->persist($userAdmin);
        $manager->persist($user);

        $manager->flush();

        $this->addReference('admin-user', $userAdmin);
        $this->addReference('common-user', $user);
    }

    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 1;
    }
} 