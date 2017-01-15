<?php

namespace AppBundle\Twig;

use AppBundle\Entity\{
    Details, Movements, Products
};

use AppBundle\Repository\MovementsRepository;
use AppBundle\Repository\Repository;
use Doctrine\ORM\EntityManager;

/**
 * Class AppExtension
 * @package AppBundle\Twig
 */
class AppExtension extends \Twig_Extension
{

    /**
     * @var
     */
    private $em;

    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    public function getFilters()
    {
        return array(
            new \Twig_SimpleFilter('calculateMovements', array($this, 'calculateMovements')),
        );
    }

    /**
     * @param $object
     * @return mixed
     */
    public function calculateMovements($object)
    {
        return $this->movements($object);
    }

    /**
     * @param Details $details
     * @return mixed
     */
    private function movements(Details $details)
    {
        $movement = $this->em->getRepository('AppBundle:Movements')
            ->getCalculateMovements($details);

        $quantity = $details->getQuantity();

        /** @var Products $product */
        $product = $details->getMetadata()['product'];

        $calculate = $product->getPrice() * $quantity;

        if (!empty($movement)) {

            $calculate = $calculate - $movement[$details->getId()];
        }

        return $calculate;
    }

    public function getName()
    {
        return 'app_extension';
    }
}