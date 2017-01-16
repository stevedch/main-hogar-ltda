<?php

namespace AppBundle\Repository;

use Doctrine\Common\Persistence\ObjectRepository;

/**
 * Interface RepositoryInterface
 * @package App\Repository
 */
interface RepositoryInterface extends ObjectRepository
{
    /**
     * @return mixed
     */
    public function create();

    /**
     * @param $entity
     * @return mixed
     */
    public function save($entity);

    /**
     * @param $entity
     * @param bool $flush
     * @return mixed
     */
    public function persist($entity, $flush = false);

    /**
     * @param $entity
     * @param bool $flush
     * @return mixed
     */
    public function remove($entity, $flush = false);

    /**
     * @return mixed
     */
    public function flush();
}
