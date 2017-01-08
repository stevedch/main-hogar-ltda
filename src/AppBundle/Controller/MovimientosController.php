<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Movimientos;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Movimiento controller.
 *
 */
class MovimientosController extends Controller
{
    /**
     * Lists all movimiento entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $movimientos = $em->getRepository('AppBundle:Movimientos')->findAll();

        return $this->render('movimientos/index.html.twig', array(
            'movimientos' => $movimientos,
        ));
    }

    /**
     * Creates a new movimiento entity.
     *
     */
    public function newAction(Request $request)
    {
        $movimiento = new Movimientos();
        $form = $this->createForm('AppBundle\Form\MovimientosType', $movimiento);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($movimiento);
            $em->flush($movimiento);

            return $this->redirectToRoute('movimientos_show', array('id' => $movimiento->getId()));
        }

        return $this->render('movimientos/new.html.twig', array(
            'movimiento' => $movimiento,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a movimiento entity.
     *
     */
    public function showAction(Movimientos $movimiento)
    {
        $deleteForm = $this->createDeleteForm($movimiento);

        return $this->render('movimientos/show.html.twig', array(
            'movimiento' => $movimiento,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing movimiento entity.
     *
     */
    public function editAction(Request $request, Movimientos $movimiento)
    {
        $deleteForm = $this->createDeleteForm($movimiento);
        $editForm = $this->createForm('AppBundle\Form\MovimientosType', $movimiento);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('movimientos_edit', array('id' => $movimiento->getId()));
        }

        return $this->render('movimientos/edit.html.twig', array(
            'movimiento' => $movimiento,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a movimiento entity.
     *
     */
    public function deleteAction(Request $request, Movimientos $movimiento)
    {
        $form = $this->createDeleteForm($movimiento);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($movimiento);
            $em->flush($movimiento);
        }

        return $this->redirectToRoute('movimientos_index');
    }

    /**
     * Creates a form to delete a movimiento entity.
     *
     * @param Movimientos $movimiento The movimiento entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Movimientos $movimiento)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('movimientos_delete', array('id' => $movimiento->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
