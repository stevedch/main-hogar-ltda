<?php

namespace AppBundle\Controller;

use AppBundle\Entity\HistorialDeudor;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Historialdeudor controller.
 *
 */
class HistorialDeudorController extends Controller
{
    /**
     * Lists all historialDeudor entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $historialDeudors = $em->getRepository('AppBundle:HistorialDeudor')->findAll();

        return $this->render('historialdeudor/index.html.twig', array(
            'historialDeudors' => $historialDeudors,
        ));
    }

    /**
     * Creates a new historialDeudor entity.
     *
     */
    public function newAction(Request $request)
    {
        $historialDeudor = new Historialdeudor();
        $form = $this->createForm('AppBundle\Form\HistorialDeudorType', $historialDeudor);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($historialDeudor);
            $em->flush($historialDeudor);

            return $this->redirectToRoute('historialdeudor_show', array('id' => $historialDeudor->getId()));
        }

        return $this->render('historialdeudor/new.html.twig', array(
            'historialDeudor' => $historialDeudor,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a historialDeudor entity.
     *
     */
    public function showAction(HistorialDeudor $historialDeudor)
    {
        $deleteForm = $this->createDeleteForm($historialDeudor);

        return $this->render('historialdeudor/show.html.twig', array(
            'historialDeudor' => $historialDeudor,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing historialDeudor entity.
     *
     */
    public function editAction(Request $request, HistorialDeudor $historialDeudor)
    {
        $deleteForm = $this->createDeleteForm($historialDeudor);
        $editForm = $this->createForm('AppBundle\Form\HistorialDeudorType', $historialDeudor);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('historialdeudor_edit', array('id' => $historialDeudor->getId()));
        }

        return $this->render('historialdeudor/edit.html.twig', array(
            'historialDeudor' => $historialDeudor,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a historialDeudor entity.
     *
     */
    public function deleteAction(Request $request, HistorialDeudor $historialDeudor)
    {
        $form = $this->createDeleteForm($historialDeudor);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($historialDeudor);
            $em->flush($historialDeudor);
        }

        return $this->redirectToRoute('historialdeudor_index');
    }

    /**
     * Creates a form to delete a historialDeudor entity.
     *
     * @param HistorialDeudor $historialDeudor The historialDeudor entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(HistorialDeudor $historialDeudor)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('historialdeudor_delete', array('id' => $historialDeudor->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
