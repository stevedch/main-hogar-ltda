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
            ->add('rut', TextType::class, array(
                'label' => 'Rut',
                'attr' => [
                    'class' => 'uk-input',
                ],
            ))
            ->add('name', TextType::class, array(
                'label' => 'Nombres',
                'attr' => [
                    'class' => 'uk-input',
                ],
            ))
            ->add('lastName', TextType::class, array(
                'label' => 'Apellido Paterno',
                'attr' => [
                    'class' => 'uk-input',
                ],
            ))
            ->add('mothersLastName', TextType::class, array(
                'label' => 'Apellido Materno',
                'attr' => [
                    'class' => 'uk-input',
                ],
            ))
            ->add('email', EmailType::class, array(
                'label' => 'form.email',
                'attr' => [
                    'class' => 'uk-input',
                ],
                'translation_domain' => 'FOSUserBundle'
            ))
            ->add('username', null, array(
                'label' => 'form.username',
                'attr' => [
                    'class' => 'uk-input',
                ],
                'translation_domain' => 'FOSUserBundle'
            ))
            ->add('plainPassword', RepeatedType::class, array(
                'required' => false,
                'attr' => [
                    'class' => 'uk-input',
                ],
                'type' => PasswordType::class,
                'options' => array('translation_domain' => 'FOSUserBundle'),
                'first_options' => array('label' => 'form.password'),
                'second_options' => array('label' => 'form.password_confirmation'),
                'invalid_message' => 'fos_user.password.mismatch',
            ))
            ->add('roles', ChoiceType::class, array(
                'label' => 'Tipo de rol',
                'attr' => [
                    'class' => 'uk-select',
                ],
                'required' => false,
                'multiple' => true,
                'choices' => array(
                    'Administrador general' => 'ROLE_ADMIN_GENERAL',
                    'Gerente' => 'ROLE_GERENTE',
                    'Operador' => 'ROLE_OPERADOR'
                )
            ));
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
