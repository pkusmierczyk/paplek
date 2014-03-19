<?php

namespace Hanky\PaplekBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Hanky\PaplekBundle\Form\LoginForm;
use Hanky\PaplekBundle\Form\RegisterForm;
use Symfony\Component\HttpFoundation\Request;
use Hanky\PaplekBundle\Entity\User;

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
            $formData = $form->getData();

            $user = new User();
            $user->setLogin($formData['login']);
            $user->setEmail($formData['email']);
            $user->setPasswd($formData['passwd']);

            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();

            return $this->render('HankyPaplekBundle:Default:registerSuccess.html.twig', array(
                'email' => $user->getEmail(),
                'login' => $user->getLogin()
            ));
        }

        return $this->render('HankyPaplekBundle:Default:register.html.twig', array(
            'form' => $form->createView()
        ));
    }
}
