<?php
/**
 * Created by PhpStorm.
 * User: piotr
 * Date: 19.03.14
 * Time: 18:07
 */

namespace Hanky\PaplekBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Email;

class RegisterForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('login', 'text', array(
                'label' => 'Login',
                'constraints' => array(
                    new Length(array(
                        'min' => 3,
                        'max' => 31,
                        'minMessage' => 'Login musi mieć długość co najmniej {{ limit }} znaków',
                        'minMessage' => 'Login musi mieć długość co najwyżej {{ limit }} znaków',
                    )),
                    new NotBlank()
                )
            ))
            ->add('email', 'text', array(
                'label' => 'Email',
                'constraints' => array(
                    new Email(array(
                        'message' => 'Podany email jest niepoprawny'
                    )),
                    new Length(array(
                        'min' => 3,
                        'max' => 31,
                        'minMessage' => 'Email musi mieć długość co najmniej {{ limit }} znaków',
                        'minMessage' => 'Email musi mieć długość co najwyżej {{ limit }} znaków',
                    )),
                    new NotBlank()
                )
            ))
            ->add('passwd', 'repeated', array(
                'type' => 'password',
                'invalid_message' => 'Hasła nie były takie same',
                'required' => true,
                'first_options'  => array('label' => 'Hasło'),
                'second_options' => array('label' => 'Powtórz hasło'),
                'label' => 'Hasło',
                'constraints' => array(
                    new Length(array(
                        'min' => 5,
                        'max' => 127,
                        'minMessage' => 'Hasło musi mieć długość co najmniej {{ limit }} znaków',
                        'minMessage' => 'Hasło musi mieć długość co najwyżej {{ limit }} znaków',
                        )),
                    new NotBlank()
                )
            ))
            ->add('save', 'submit');
    }

    public function getName()
    {
        return 'register';
    }
} 