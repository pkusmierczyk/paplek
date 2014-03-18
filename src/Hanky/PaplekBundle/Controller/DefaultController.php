<?php

namespace Hanky\PaplekBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Hanky\PaplekBundle\Entity\Post;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $posts = $this->getDoctrine()
            ->getRepository('HankyPaplekBundle:Post')
            ->findAll();

        return $this->render('HankyPaplekBundle:Default:index.html.twig', array('posts' => $posts));
    }
}
