<?php
namespace GestSchool\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ClassListType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('code', ChoiceType::class, 
            array(
                'choices' => $options['classes'],
                'placeholder' => 'Choose your class',
                'choice_label' => function ($class, $key, $index) {
                    return strtoupper($index);
                }));
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefault('classes', null)
            ->setRequired('classes')
            ->setAllowedTypes('classes', array('array'));
    }
}