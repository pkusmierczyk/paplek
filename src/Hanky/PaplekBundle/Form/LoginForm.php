<?php
/**
 * Created by PhpStorm.
 * User: piotr
 * Date: 18.03.14
 * Time: 21:09
 */

namespace Hanky\PaplekBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\NotBlank;

class LoginForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('username', 'text', array(
                'label' => 'Login',
                'constraints' => array(
                    new NotBlank()
                ))
            )
            ->add('password', 'password', array(
                'label' => 'Hasło',
                'constraints' => array(
                    new NotBlank()
                ))
            )
            ->add('save', 'submit', array(
                'label' => 'Zaloguj'
            ));
    }

    public function getName()
    {
        return 'login';
    }
} 