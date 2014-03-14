<?php
/**
 * Created by PhpStorm.
 * User: piotr
 * Date: 14.03.14
 * Time: 12:45
 */

namespace Hanky\PaplekBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="comment")
 */
class Comment {

    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=127, nullable=false)
     */
    protected $content;

    /**
     * @ORM\ManyToOne(targetEntity="Post", inversedBy="comments")
     * @ORM\JoinColumn(name="post_id", referencedColumnName="id", nullable=false)
     */
    protected $post;

    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="id")
     * @ORM\JoinColumn(name="author_id", referencedColumnName="id", nullable=false)
     */
    protected $author;

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
     * Set content
     *
     * @param string $content
     * @return Comment
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get content
     *
     * @return string 
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set post
     *
     * @param \Hanky\PaplekBundle\Entity\Post $post
     * @return Comment
     */
    public function setPost(\Hanky\PaplekBundle\Entity\Post $post)
    {
        $this->post = $post;

        return $this;
    }

    /**
     * Get post
     *
     * @return \Hanky\PaplekBundle\Entity\Post 
     */
    public function getPost()
    {
        return $this->post;
    }

    /**
     * Set author
     *
     * @param \Hanky\PaplekBundle\Entity\User $author
     * @return Comment
     */
    public function setAuthor(\Hanky\PaplekBundle\Entity\User $author)
    {
        $this->author = $author;

        return $this;
    }

    /**
     * Get author
     *
     * @return \Hanky\PaplekBundle\Entity\User 
     */
    public function getAuthor()
    {
        return $this->author;
    }
}
