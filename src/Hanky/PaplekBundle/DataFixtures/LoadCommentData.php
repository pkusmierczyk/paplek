<?php
/**
 * Created by PhpStorm.
 * User: piotr
 * Date: 17.03.14
 * Time: 22:31
 */

namespace Hanky\PaplekBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Hanky\PaplekBundle\Entity\Comment;

class LoadCommentData extends AbstractFixture implements OrderedFixtureInterface {
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $firstComment = new Comment();
        $firstComment->setContent("gratuluje!");
        $firstComment->setPost($this->getReference('first-post'));
        $firstComment->setAuthor($this->getReference('common-user'));

        $secondComment = new Comment();
        $secondComment->setContent("dziekuje!");
        $secondComment->setPost($this->getReference('first-post'));
        $secondComment->setAuthor($this->getReference('admin-user'));

        $thirdComment = new Comment();
        $thirdComment->setContent("wow, super");
        $thirdComment->setPost($this->getReference('second-post'));
        $thirdComment->setAuthor($this->getReference('admin-user'));

        $manager->persist($firstComment);
        $manager->persist($secondComment);
        $manager->persist($thirdComment);

        $manager->flush();
    }

    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 3;
    }
} 