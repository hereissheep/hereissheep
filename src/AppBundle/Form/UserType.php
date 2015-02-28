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
            ->add('search', 'search')
            ->add('submit', 'submit');
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