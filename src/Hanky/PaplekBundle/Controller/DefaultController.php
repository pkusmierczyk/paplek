<?php

namespace Hanky\PaplekBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Hanky\PaplekBundle\Form\LoginForm;
use Hanky\PaplekBundle\Form\RegisterForm;
use Hanky\PaplekBundle\Form\PostForm;
use Hanky\PaplekBundle\Form\CommentForm;
use Symfony\Component\HttpFoundation\Request;
use Hanky\PaplekBundle\Entity\User;
use Hanky\PaplekBundle\Entity\Post;
use Hanky\PaplekBundle\Entity\Comment;

class DefaultController extends Controller
{
    public function indexAction(Request $request)
    {
        $session = $request->getSession();
        $isLogged = $session->get('id');

        $posts = $this->getDoctrine()
            ->getRepository('HankyPaplekBundle:Post')
            ->findAll();

        return $this->render('HankyPaplekBundle:Default:index.html.twig', array(
            'posts' => $posts,
            'isLogged' => isset($isLogged)
        ));
    }

    public function loginAction(Request $request)
    {
        $session = $request->getSession();
        $isLogged = $session->get('id');

        $form = $this->createForm(new LoginForm());

        $form->handleRequest($request);

        if ($form->isValid()) {
            $formData = $form->getData();

            $repo = $this->getDoctrine()->getRepository('HankyPaplekBundle:User');
            $user = $repo->findOneByLogin($formData['username']);

            if (isset($user) && $formData['password'] == $user->getPasswd()) {
                $session = $request->getSession();

                $session->set('id', $user->getId());
            }

            return $this->redirect($this->generateUrl('hanky_paplek_homepage'));
        }

        return $this->render('HankyPaplekBundle:Default:login.html.twig', array(
            'form' => $form->createView(),
            'isLogged' => isset($isLogged)
        ));
    }

    public function logoutAction(Request $request) {
        $session = $request->getSession();

        $session->clear();

        return $this->render('HankyPaplekBundle:Default:logout.html.twig', array(
            'isLogged' => false,
        ));
    }

    public function registerAction(Request $request)
    {
        $session = $request->getSession();
        $userId = $session->get('id');

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
            'form' => $form->createView(),
            'isLogged' => isset($userId),
        ));
    }

    public function postAction(Request $request)
    {
        $session = $request->getSession();
        $userId = $session->get('id');

        if (isset($userId)) {
            $user = $this->getDoctrine()->getRepository('HankyPaplekBundle:User')->findOneById($userId);


            $form = $this->createForm(new PostForm());

            $form->handleRequest($request);

            if ($form->isValid()) {
                $formData = $form->getData();

                $post = new Post();
                $post->setAuthor($user);
                $post->setContent($formData['post']);

                $em = $this->getDoctrine()->getManager();
                $em->persist($post);
                $em->flush();

                return $this->redirect($this->generateUrl('hanky_paplek_homepage'));
            }

            return $this->render('HankyPaplekBundle:Default:post.html.twig', array(
                'form' => $form->createView(),
                'isLogged' => isset($userId)
            ));
        } else {
            return $this->redirect($this->generateUrl('hanky_paplek_homepage'));
        }
    }

    public function commentAction(Request $request, $id) {
        $session = $request->getSession();
        $userId = $session->get('id');

        if (isset($userId)) {
            $user = $this->getDoctrine()->getRepository('HankyPaplekBundle:User')->findOneById($userId);
            $post = $this->getDoctrine()->getRepository('HankyPaplekBundle:Post')->findOneById($id);

            $form = $this->createForm(new CommentForm());

            $form->handleRequest($request);

            if ($form->isValid()) {
                $formData = $form->getData();

                $comment = new Comment();
                $comment->setAuthor($user);
                $comment->setPost($post);
                $comment->setContent($formData['comment']);

                $em = $this->getDoctrine()->getManager();
                $em->persist($comment);
                $em->flush();

                return $this->redirect($this->generateUrl('hanky_paplek_homepage'));
            }

            return $this->render('HankyPaplekBundle:Default:comment.html.twig', array(
                'form' => $form->createView(),
                'isLogged' => isset($userId)
            ));
        } else {
            return $this->redirect($this->generateUrl('hanky_paplek_homepage'));
        }
    }
}
