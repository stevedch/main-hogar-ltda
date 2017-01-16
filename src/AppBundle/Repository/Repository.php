<?php

namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Query;
use JMS\DiExtraBundle\Annotation\Inject;
use JMS\DiExtraBundle\Annotation\InjectParams;
use Symfony\Component\DependencyInjection\Container;
use Symfony\Component\DependencyInjection\ContainerInterface;

class Repository extends EntityRepository implements RepositoryInterface
{
    /**
     * @var Container
     */
    protected $container;

    /**
     * @return mixed
     */
    public function create()
    {
        $className = $this->getClassName();

        return new $className();
    }

    /**
     * @param $entity
     */
    public function save($entity)
    {
        $this->persist($entity, true);
    }

    /**
     * @param $entity
     * @param bool $flush
     */
    public function persist($entity, $flush = false)
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    /**
     * @param $entity
     * @param bool $flush
     */
    public function remove($entity, $flush = false)
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    /**
     *
     */
    public function flush()
    {
        $this->getEntityManager()->flush();
    }

    /**
     * @param Query $query
     * @return mixed
     */
    public function paginate(Query $query)
    {
        $request = $this->get('request_stack')->getCurrentRequest();
        $page    = $request->query->getInt('page', 1);
        $perPage = $request->query->getInt('per_page', 9);

        return $this->get('knp_paginator')->paginate($query, $page, $perPage);
    }

    /**
     * @InjectParams({
     *     "container" = @Inject("service_container")
     * })
     */
    public function setContainer(ContainerInterface $container)
    {
        $this->container = $container;
    }

    /**
     * @param $id
     * @return mixed
     */
    protected function has($id)
    {
        return $this->container->has($id);
    }

    /**
     * @param $id
     * @param int $invalidBehavior
     * @return mixed
     */
    protected function get($id, $invalidBehavior = ContainerInterface::EXCEPTION_ON_INVALID_REFERENCE)
    {
        return $this->container->get($id, $invalidBehavior);
    }

    /**
     * @param $name
     * @return mixed
     */
    protected function getParameter($name)
    {
        return $this->container->getParameter($name);
    }
}
