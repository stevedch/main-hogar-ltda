<?php

namespace AppBundle\EventListener;

use AppBundle\Entity\Supplier;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Event\LifecycleEventArgs;

/**
 * Class CodeGeneratorListener
 * @package AppBundle\EventListener
 */
class CodeGeneratorListener
{
    const INIT_NUMBER = 10000;

    private static $allowedClasses = [
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

        $code = $this->getNextCode($args->getEntityManager());
        $entity->setCode(++$code);
    }

    public function getNextCode(EntityManager $em)
    {
        $codes = [];

        foreach (self::$allowedClasses as $cls) {
            $result = $em->getRepository($cls)
                ->createQueryBuilder('o')
                ->select('o.code')
                ->orderBy('o.code', 'DESC')
                ->getQuery()
                ->setMaxResults(1)
                ->getOneOrNullResult();

            $code = $result['code'];
            $codes[] = is_numeric($code) ? $code : self::INIT_NUMBER;
        }

        return max($codes);
    }
}