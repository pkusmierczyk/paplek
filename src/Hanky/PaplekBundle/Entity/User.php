<?php
/**
 * Created by PhpStorm.
 * User: piotr
 * Date: 12.03.14
 * Time: 00:01
 */

namespace Hanky\PaplekBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Table(name="user")
 */
class User {

    public function __construct() {
        $this->posts = new ArrayCollection();
    }

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
     * @ORM\Column(type="string", length=127, nullable=false)
     */
    protected $passwd;

    /**
     * @ORM\Column(type="string", length=31, nullable=false)
     */
    protected $login;

    /**
     * @ORM\Column(type="string", length=31, nullable=false)
     */
    protected $email;

    /**
     * @ORM\OneToMany(targetEntity="Post", mappedBy="author")
     */
    protected $posts;

    /**
     * @ORM\OneToMany(targetEntity="Comment", mappedBy="author")
     */
    protected $comments;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set firstName
     *
     * @param string $firstName
     * @return User
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Get firstName
     *
     * @return string 
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set lastName
     *
     * @param string $lastName
     * @return User
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Get lastName
     *
     * @return string 
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Set passwd
     *
     * @param string $passwd
     * @return User
     */
    public function setPasswd($passwd)
    {
        $this->passwd = $passwd;

        return $this;
    }

    /**
     * Get passwd
     *
     * @return string 
     */
    public function getPasswd()
    {
        return $this->passwd;
    }

    /**
     * Set login
     *
     * @param string $login
     * @return User
     */
    public function setLogin($login)
    {
        $this->login = $login;

        return $this;
    }

    /**
     * Get login
     *
     * @return string 
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return User
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Add posts
     *
     * @param \Hanky\PaplekBundle\Entity\Post $posts
     * @return User
     */
    public function addPost(\Hanky\PaplekBundle\Entity\Post $posts)
    {
        $this->posts[] = $posts;

        return $this;
    }

    /**
     * Remove posts
     *
     * @param \Hanky\PaplekBundle\Entity\Post $posts
     */
    public function removePost(\Hanky\PaplekBundle\Entity\Post $posts)
    {
        $this->posts->removeElement($posts);
    }

    /**
     * Get posts
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPosts()
    {
        return $this->posts;
    }

    /**
     * Add comments
     *
     * @param \Hanky\PaplekBundle\Entity\Comment $comments
     * @return User
     */
    public function addComment(\Hanky\PaplekBundle\Entity\Comment $comments)
    {
        $this->comments[] = $comments;

        return $this;
    }

    /**
     * Remove comments
     *
     * @param \Hanky\PaplekBundle\Entity\Comment $comments
     */
    public function removeComment(\Hanky\PaplekBundle\Entity\Comment $comments)
    {
        $this->comments->removeElement($comments);
    }

    /**
     * Get comments
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getComments()
    {
        return $this->comments;
    }
}
