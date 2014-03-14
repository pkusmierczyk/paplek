<?php
/**
 * Created by PhpStorm.
 * User: piotr
 * Date: 12.03.14
 * Time: 00:01
 */

namespace Hanky\PaplekBundle\Entity;

/**
 * @ORM\Entity
 * @ORM\Table(name="user")
 */
class User {
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=15)
     */
    protected $firstName;

    /**
     * @ORM\Column(type="string", length=31)
     */
    protected $lastName;

    /**
     * @ORM\Column(type="string", length=127)
     */
    protected $passwd;

    /**
     * @ORM\Column(type="string", length=31)
     */
    protected $login;

    /**
     * @ORM\Column(type="string", length=31)
     */
    protected $email;
}