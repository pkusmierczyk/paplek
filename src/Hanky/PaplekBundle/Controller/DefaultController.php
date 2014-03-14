<?php

namespace Hanky\PaplekBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $name = 'Lolek';
        return $this->render('HankyPaplekBundle:Default:index.html.twig', array('name' => $name));
    }
}
