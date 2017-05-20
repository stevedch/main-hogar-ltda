<?php

namespace AppBundle\Form;

use AppBundle\Entity\Products;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProductsType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'Nombre de Producto',
                'required' => false,
                'attr' => [
                    'class' => 'uk-input',
                ],
            ])
            ->add('quantity', IntegerType::class, [
                'label' => 'Cantidad de Producto',
                'required' => false,
                'attr' => [
                    'class' => 'uk-input',
                ],
            ])
            ->add('price', IntegerType::class, [
                'label' => 'Precio de Producto',
                'required' => false,
                'attr' => [
                    'class' => 'uk-input',
                ],
            ])->add('cellar', CellarType::class, [
                'label' => false,
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
            'data_class' => Products::class
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_products';
    }


}
