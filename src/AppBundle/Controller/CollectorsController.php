<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class CollectorsController extends Controller
{

    public function indexAction()
    {

        return $this->render('collectors/index.html.twig');
    }
}
