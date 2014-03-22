<?php
/**
 * Created by PhpStorm.
 * User: piotr
 * Date: 22.03.14
 * Time: 14:48
 */

namespace Hanky\PaplekBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Length;

class CommentForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('comment', 'textarea', array(
                    'label' => 'Treść komentarza',
                    'constraints' => array(
                        new Length(array(
                            'max' => 127,
                            'minMessage' => 'Komentarz musi mieć długość co najwyżej {{ limit }} znaków',
                        )),
                        new NotBlank()
                    ))
            )
            ->add('save', 'submit', array(
                'label' => 'Wyślij'
            ));
    }

    public function getName()
    {
        return 'comment';
    }
} 