<?php

namespace AppBundle\EventListener;

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
        Details::class
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

        $next = $this->getNextNumber($args->getEntityManager());
        $entity->setNumber(++$next);
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
}