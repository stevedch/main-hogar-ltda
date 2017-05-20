<?php

namespace AppBundle\Form;

use AppBundle\Entity\Details;
use Doctrine\DBAL\Types\DecimalType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DetailsType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('quantity', IntegerType::class, [
                'attr' => [
                    'class' => 'uk-input',
                ],
            ])
            ->add('iva', IntegerType::class, [
                'attr' => [
                    'class' => 'uk-input',
                ],
            ])
            ->add('discount', IntegerType::class, [
                'attr' => [
                    'class' => 'uk-input',
                ],
            ])
            ->add('valueTotal', IntegerType::class, [
                'attr' => [
                    'class' => 'uk-input',
                ],
            ]);

        $builder->add('supplier', SupplierType::class, [])
            ->add('product', ProductsType::class, []);

        $builder->add('customer', CustomersType::class, []);
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Details::class
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_details';
    }
}
