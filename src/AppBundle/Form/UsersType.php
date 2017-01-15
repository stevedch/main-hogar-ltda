<?php

namespace AppBundle\Form;

use AppBundle\Entity\Users;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UsersType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('rut', IntegerType::class, array(
                'label' => 'Rut',
            ))
            ->add('name', TextType::class, array(
                'label' => 'Nombres',
            ))
            ->add('lastName', TextType::class, array(
                'label' => 'Apellido Paterno',
            ))
            ->add('mothersLastName', TextType::class, array(
                'label' => 'Apellido Materno',
            ))
            ->add('email', EmailType::class, array(
                'label' => 'form.email',
                'translation_domain' => 'FOSUserBundle'
            ))
            ->add('username', null, array(
                'label' => 'form.username',
                'translation_domain' => 'FOSUserBundle'
            ))
            ->add('plainPassword', RepeatedType::class, array(
                'type' => PasswordType::class,
                'options' => array('translation_domain' => 'FOSUserBundle'),
                'first_options' => array('label' => 'form.password'),
                'second_options' => array('label' => 'form.password_confirmation'),
                'invalid_message' => 'fos_user.password.mismatch',
            ))
            ->add('roles', ChoiceType::class, array(
                'label' => 'Tipo de rol',
                'required' => false,
                'multiple' => true,
                'choices' => array(
                    'Administrador general' => 'ROLE_ADMIN_GENERAL',
                    'Vendedor' => 'ROLE_VENDEDOR',
                    'Cobrador' => 'ROLE_COBRADOR',
                    'Gerente de finanzas' => 'ROLE_GERENTE_FINANZAS',
                    'Gerente de ventas' => 'ROLE_GERENTE_VENTAS',
                )
            ))
        ;
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(
            array(
                'data_class' => Users::class,
                'intention' => 'registration'
            )
        );
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'fos_user_registration';
    }
}
