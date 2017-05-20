<?php

namespace AppBundle\EventListener;

use AppBundle\Entity\Supplier;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Event\LifecycleEventArgs;
use AppBundle\Entity\Details;

/**
 * Class NumberGeneratorListener
 * @package AppBundle\EventListener
 */
class NumberGeneratorListener
{

    const INIT_NUMBER = 10000;

    private static $allowedClasses = [
        Details::class,
        Supplier::class
    ];

    /**
     * @param LifecycleEventArgs $args
     * @throws \Doctrine\ORM\NonUniqueResultException
     */
    public function prePersist(LifecycleEventArgs $args)
    {
        $entity = $args->getEntity();

        if (!in_array(get_class($entity), self::$allowedClasses, true)) {
            return;
        }

        $details = new Details();

        if (self::$allowedClasses instanceof $details) {

            $number = $this->getNextNumber($args->getEntityManager());
            $entity->setNumber(++$number);
        }

        $supplier = new Supplier();

        if (self::$allowedClasses instanceof $supplier) {

            $code = $this->getNextCode($args->getEntityManager());
            $entity->setCode(++$code);
        }
    }

    public function getNextNumber(EntityManager $em)
    {
        $numbers = [];

        foreach (self::$allowedClasses as $cls) {
            $result = $em->getRepository($cls)
                ->createQueryBuilder('o')
                ->select('o.number')
                ->orderBy('o.number', 'DESC')
                ->getQuery()
                ->setMaxResults(1)
                ->getOneOrNullResult();

            $number = $result['number'];
            $numbers[] = is_numeric($number) ? $number : self::INIT_NUMBER;
        }

        return max($numbers);
    }

    public function getNextCode(EntityManager $em)
    {
        $numbers = [];

        foreach (self::$allowedClasses as $cls) {
            $result = $em->getRepository($cls)
                ->createQueryBuilder('o')
                ->select('o.code')
                ->orderBy('o.code', 'DESC')
                ->getQuery()
                ->setMaxResults(1)
                ->getOneOrNullResult();

            $code = $result['code'];
            $numbers[] = is_numeric($code) ? $code : self::INIT_NUMBER;
        }

        return max($numbers);
    }
}