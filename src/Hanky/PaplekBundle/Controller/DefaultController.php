<?php

namespace Hanky\PaplekBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Hanky\PaplekBundle\Form\LoginForm;
use Hanky\PaplekBundle\Form\RegisterForm;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $posts = $this->getDoctrine()
            ->getRepository('HankyPaplekBundle:Post')
            ->findAll();

        return $this->render('HankyPaplekBundle:Default:index.html.twig', array('posts' => $posts));
    }

    public function loginAction(Request $request)
    {
        $form = $this->createForm(new LoginForm());

        $form->handleRequest($request);

        if ($form->isValid()) {


            return $this->redirect($this->generateUrl('hanky_paplek_homepage'));
        }

        return $this->render('HankyPaplekBundle:Default:login.html.twig', array(
            'form' => $form->createView()
        ));
    }

    public function registerAction(Request $request)
    {
        $form = $this->createForm(new RegisterForm());

        $form->handleRequest($request);

        if ($form->isValid()) {
            var_dump($form->get('login'));exit;

            return $this->redirect($this->generateUrl('hanky_paplek_homepage'));
        }

        return $this->render('HankyPaplekBundle:Default:register.html.twig', array(
            'form' => $form->createView()
        ));
    }
}
