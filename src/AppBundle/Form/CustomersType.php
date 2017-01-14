<?php

namespace AppBundle\Form;

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
            ->add('homeAddress', TextType::class, [
                'label' => 'Dirección de casa'
            ])
            ->add('workAddress', TextType::class, [
                'label' => 'Dirección de trabajo'
            ])
            ->add('fixedNetworkPhone', TextType::class, [
                'label' => 'Teléfono fijo'
            ])
            ->add('cellPhone', TextType::class, [
                'label' => 'Teléfono celular'
            ])
            ->add('email', EmailType::class, [
                'label' => 'Email'
            ])
            ->add('accountOpeningDate', DateType::class, [
                'label' => 'Fecha de apertura',
                'widget' => 'choice',
                'format' => 'dd/MM/yyyy',
                'required' => false,
                'attr' => [
                    'class' => 'datepicker',
                    'data-date-autoclose' => 'true',
                    'data-date-format' => 'dd/mm/yyyy',
                ],
            ])
            ->add('accountNumber', IntegerType::class, [
                'label' => 'Número de cuenta'
            ])
            ->add('authorizedCredit', IntegerType::class, [
                'label' => 'crédito autorizado'
            ])
            ->add('paymentDateAgreed', DateType::class, [
                'label' => 'Fecha de pago de acuerdo',
                'widget' => 'choice',
                'format' => 'dd/MM/yyyy',
                'required' => false,
                'attr' => [
                    'class' => 'datepicker',
                    'data-date-autoclose' => 'true',
                    'data-date-format' => 'dd/mm/yyyy',
                ],
            ])
            ->add('totalCharge', IntegerType::class, [
                'label' => 'Total cargo'
            ])
            ->add('totalDeposit', IntegerType::class, [
                'label' => 'Total de depósito'
            ])
            ->add('quantity', IntegerType::class, [
                'label' => 'Cantidad de producto'
            ])
            ->add('product', EntityType::class, array(
                'label' => 'Seleccione el producto',
                'class' => 'AppBundle:Products',
                'choice_label' => 'name',
                'attr' => [
                    'class ' => 'form-control',
                    'placeholder' => 'seleccione el nombre del producto'
                ],
            ))
        ;
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => null
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
