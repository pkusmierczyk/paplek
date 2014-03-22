<?php
/**
 * Created by PhpStorm.
 * User: piotr
 * Date: 22.03.14
 * Time: 13:59
 */

namespace Hanky\PaplekBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Length;

class PostForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('post', 'textarea', array(
                    'label' => 'Treść postu',
                    'constraints' => array(
                        new Length(array(
                            'max' => 127,
                            'minMessage' => 'Post musi mieć długość co najwyżej {{ limit }} znaków',
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
        return 'post';
    }
} 