<?php
/**
 * Search form
 *
 * @author José Francisco <dudemelo@gmail.com>
 */

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('username', [
                'attr' => [
                    'class'         => 'form-control',
                    'placeholder'   => 'Full name'
                ]
            ])
            ->add('email', [
                'attr' => [
                    'class'         => 'form-control',
                    'placeholder'   => 'email@domain.com'
                ]
            ])
            ->add('password', [
                'attr' => [
                    'class'         => 'form-control',
                    'placeholder'   => 'New password'
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
            'data_class' => 'ApiBundle/Entity/User'
        ]);
    }
}