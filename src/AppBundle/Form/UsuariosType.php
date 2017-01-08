<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UsuariosType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('rut')
            ->add('nombreUsuario')
            ->add('nombre')
            ->add('apellidoParteno')
            ->add('apellidoMarteno')
            ->add('contrasenia')
            ->add('roles', ChoiceType::class, array(
                'required' => false,
                'multiple' => true,
                'choices' => array(
                    'Vendedor' => 'ROLE_VENDEDOR',
                    'Cobrador' => 'ROLE_COBRADOR',
                    'Gerente de finanzas' => 'ROLE_GERENTE_FINANZAS',
                    'Gerente de ventas' => 'ROLE_GERENTE_VENTAS',
                ),
            ));
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Usuarios'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_usuarios';
    }


}
