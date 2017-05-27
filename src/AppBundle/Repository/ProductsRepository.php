<?php

namespace AppBundle\Repository;

use AppBundle\Entity\Cellar;
use Doctrine\ORM\Query\Expr\Join;

class ProductsRepository extends Repository
{

    public function productAll()
    {

        $qb = $this->createQueryBuilder('p');

        return ['data' => $qb->getQuery()->getArrayResult()];
    }

}