<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Details;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class CollectorsController extends Controller
{

    public function indexAction()
    {
        $details = $this->getDoctrine()
            ->getRepository('AppBundle:Details')->findAll();

        return $this->render('collectors/index.html.twig', [
            'details' => $details
        ]);
    }

    public function collectorSaleAction(Details $detail)
    {

        dump($detail); exit;
    }
}
