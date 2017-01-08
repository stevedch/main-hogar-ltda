<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ClientesType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('domicilioParticular')
            ->add('domicilioLaboral')
            ->add('fonoRedFija')
            ->add('celular')
            ->add('email')
            ->add('fechaAperturaCuenta')
            ->add('numeroCuenta')
            ->add('creditoAutorizado')
            ->add('fechaPagoPactada')
            ->add('totalCargos')
            ->add('totalAbonos')
            ->add('estado');
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Clientes'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_clientes';
    }


}
