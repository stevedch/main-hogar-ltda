<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Details;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class ManagerController extends Controller
{

    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction()
    {

        $em = $this->getDoctrine()->getManager();
        $details = $em->getRepository(Details::class)->findAll();

        return $this->render('manager/index.html.twig', array(
            'details' => $details
        ));
    }

    /**
     * @Route("operador/{id}")
     * @ParamConverter("details", class="AppBundle:Details")
     * @param Details $details
     * @return Response
     */
    public function showAction(Details $details)
    {

        return $this->render('operators/show.html.twig', array(
            'details' => $details
        ));
    }
}
