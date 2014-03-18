<?php
/**
 * Created by PhpStorm.
 * User: piotr
 * Date: 17.03.14
 * Time: 22:15
 */

namespace Hanky\PaplekBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Hanky\PaplekBundle\Entity\Post;

class LoadPostData extends AbstractFixture implements OrderedFixtureInterface {
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $firstPost = new Post();
        $firstPost->setContent("Witam, moja pierwsza papla na paplku!");
        $firstPost->setAuthor($this->getReference('admin-user'));

        $secondPost = new Post();
        $secondPost->setContent("Hej, jestem pierwszy raz na paplku!");
        $secondPost->setAuthor($this->getReference('common-user'));

        $manager->persist($firstPost);
        $manager->persist($secondPost);

        $manager->flush();

        $this->addReference('first-post', $firstPost);
        $this->addReference('second-post', $secondPost);
    }

    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 2;
    }
} 