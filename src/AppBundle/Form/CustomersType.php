<?php

namespace AppBundle\Form;

use AppBundle\Entity\Customers;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CustomersType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('rut', TextType::class, array(
                'label' => 'Rut',
                'required' => false,
                'attr' => [
                    'class' => 'uk-input',
                ],
            ))
            ->add('name', TextType::class, array(
                'label' => 'Nombres',
                'required' => false,
                'attr' => [
                    'class' => 'uk-input',
                ],
            ))
            ->add('lastName', TextType::class, array(
                'label' => 'Apellido Paterno',
                'required' => false,
                'attr' => [
                    'class' => 'uk-input',
                ],
            ))
            ->add('mothersLastName', TextType::class, array(
                'label' => 'Apellido Materno',
                'required' => false,
                'attr' => [
                    'class' => 'uk-input',
                ],
            ))
            ->add('address', TextType::class, [
                'label' => 'Dirección',
                'required' => false,
                'attr' => [
                    'class' => 'uk-input',
                ],
            ])
            ->add('email', EmailType::class, [
                'label' => 'Email',
                'required' => false,
                'attr' => [
                    'class' => 'uk-input',
                ],
            ]);
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Customers::class
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_customers';
    }


}
