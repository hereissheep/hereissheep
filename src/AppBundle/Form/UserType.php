<?php
/**
 * Search form
 *
 * @author José Francisco <dudemelo@gmail.com>
 */

namespace AppBundle\Form;

use ApiBundle\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('username', 'text', [
                'attr' => [
                    'placeholder' => 'Full name'
                ]
            ])
            ->add('email', 'text', [
                'attr' => [
                    'placeholder' => 'email@domain.com'
                ]
            ])
            ->add('password', 'password', [
                'attr' => [
                    'placeholder' => 'New password'
                ]
            ]);
    }

    public function getName()
    {
        return 'user_form';
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class
        ]);
    }
}