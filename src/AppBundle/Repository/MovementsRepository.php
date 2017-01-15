<?php
/**
 * Created by PhpStorm.
 * User: steven
 * Date: 15-01-17
 * Time: 13:55
 */

namespace AppBundle\Repository;

use AppBundle\Entity\{
    Details
};


/**
 * Class MovementsRepository
 * @package AppBundle\Repository
 */
class MovementsRepository extends Repository
{

    /**
     * @param $obj
     * @return array
     */
    public function getCalculateMovements($obj)
    {
        $qb = $this->createQueryBuilder('m');
        $qb->where($qb->expr()->eq('m.documentNumber', ':documentNumber'));
        $qb->setParameter('documentNumber', $obj);

        $results = array();

        if (!empty($data = $qb->getQuery()->getArrayResult())) {

            foreach ($data as $value) {
                $results[$obj->getId()][] = $value['rode'];
            }

            $results = array_map('array_sum', $results);
        }

        return $results;
    }

}