<?php
/**
 * Created by PhpStorm.
 * User: piotr
 * Date: 11.03.14
 * Time: 23:56
 */

namespace Hanky\PaplekBundle\Entity;

/**
 * @ORM\Entity
 * @ORM\Table(name="post")
 */
class Post {
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=127)
     */
    protected $content;

    /**
     * @ORM\Column(type="string", scale=31)
     */
    protected $authorId;
} 