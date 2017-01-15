<?php

namespace AppBundle\Controller;


use AppBundle\Entity\Customers;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class ManagerController
 * @package AppBundle\Controller
 */
class ManagerController extends Controller
{

    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getEntityManager();
        $customers = $em->getRepository('AppBundle:Customers')->findAll();

        return $this->render('manager/index.html.twig', [
            'customers' => $customers
        ]);
    }

    /**
     * @param Customers $customer
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function customerDetailAction(Customers $customer)
    {
        $records = $this->getDoctrine()->getRepository('AppBundle:Record')->findBy([
            'customer' => $customer
        ]);

        return $this->render('manager/details/index.html.twig', [
            'customer' => $customer,
            'records' => $records
        ]);
    }
}
