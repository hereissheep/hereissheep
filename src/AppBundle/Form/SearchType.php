<?php
/**
 * Search form
 *
 * @author José Francisco <dudemelo@gmail.com>
 */

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class SearchType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('search', 'search', [
                'attr' => [
                     'placeholder' => 'What you are looking for?'
                ]
            ])
            ->add('submit', 'submit', [
                'label' => 'Search'
            ]);
    }

    public function getName()
    {
        return 'search_form';
    }
}