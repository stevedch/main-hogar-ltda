<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Cellar;
use AppBundle\Entity\Details;
use AppBundle\Entity\Products;
use AppBundle\Entity\Users;
use AppBundle\Form\DetailsType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Config\Definition\Exception\Exception;
use Symfony\Component\HttpFoundation\Request;

class OperatorController extends Controller
{

    public function indexAction()
    {

        return $this->render('operators/index.html.twig', array());
    }

    public function showAction(Details $details)
    {

        return $this->render('operators/show.html.twig', array());
    }

    public function registerAction(Request $request)
    {

        $form = $this->createForm(DetailsType::class, null);
        $form->handleRequest($request);

        try {

            if ($form->isValid()) {

                $em = $this->getDoctrine()->getManager();

                /** @var Details $data */
                $data = $form->getData();
                $em->persist($data);
                $em->flush();

                return $this->redirectToRoute('operators_show', array('id' => $data->getId()));
            }
        } catch (Exception $e) {

            throw new Exception($e->getMessage());
        }

        return $this->render('operators/register.html.twig', array(
            'create_form' => $form->createView()
        ));
    }

    public function editAction()
    {

        return $this->render('operators/edit.html.twig', array());
    }

    public function deleteAction(Request $request, Details $details)
    {
        $form = $this->createDeleteForm($details);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($details);
            $em->flush($details);
        }

        return $this->redirectToRoute('operators_index');
    }

    private function createDeleteForm(Details $details)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('operators_delete', array('id' => $details->getId())))
            ->setMethod('DELETE')
            ->getForm();
    }
}
