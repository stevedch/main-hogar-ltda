<?php
/**
 * Created by PhpStorm.
 * User: steven
 * Date: 15-01-17
 * Time: 10:18
 */

namespace AppBundle\Form;


use AppBundle\Entity\Details;
use AppBundle\Entity\Movements;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PaymentType extends AbstractType
{

    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('deposit', IntegerType::class, [
                'label' => 'Monto de abono'
            ])
            ->add('movementType', ChoiceType::class, array(
                'label' => 'Seleccione la forma de cargo',
                'required' => false,
                'choices' => array(
                    'Cargo' => Movements::STATUS_CHARGE,
                    'Déposito' => Movements::STATUS_DEPOSIT,
                )
            ))
            ->add('paidForm', ChoiceType::class, array(
                'label' => 'Seleccione la forma de pago',
                'required' => false,
                'choices' => array(
                    'Efectivo' => Movements::CASH_PAYMENT,
                    'Crédito' => Movements::PAYMENT_CREDIT,
                    'Débito' => Movements::PAYMENT_DEBIT,
                    'Cheque' => Movements::PAYMENT_CHECK
                )
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
        return 'appbundle_payment';
    }

}