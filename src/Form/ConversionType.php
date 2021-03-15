<?php

namespace App\Form;

use App\Entity\Conversion;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class ConversionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('amount')
            ->add('from_currency', ChoiceType::class, [
                'choices'  => Conversion::FROM_CURRENCY
            ])
            ->add('to_currency', ChoiceType::class, [
                'choices'  => Conversion::TO_CURRENCY
            ])
            ->add('current_value_of_the_currency')
            ->add('amount_convertor')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Conversion::class,
        ]);
    }
}
