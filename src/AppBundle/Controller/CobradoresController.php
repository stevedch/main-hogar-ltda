<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Cobradores;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Cobradore controller.
 *
 */
class CobradoresController extends Controller
{
    /**
     * Lists all cobradore entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $cobradores = $em->getRepository('AppBundle:Cobradores')->findAll();

        return $this->render('cobradores/index.html.twig', array(
            'cobradores' => $cobradores,
        ));
    }

    /**
     * Creates a new cobradore entity.
     *
     */
    public function newAction(Request $request)
    {
        $cobradore = new Cobradores();
        $form = $this->createForm('AppBundle\Form\CobradoresType', $cobradore);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($cobradore);
            $em->flush($cobradore);

            return $this->redirectToRoute('cobradores_show', array('id' => $cobradore->getId()));
        }

        return $this->render('cobradores/new.html.twig', array(
            'cobradore' => $cobradore,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a cobradore entity.
     *
     */
    public function showAction(Cobradores $cobradore)
    {
        $deleteForm = $this->createDeleteForm($cobradore);

        return $this->render('cobradores/show.html.twig', array(
            'cobradore' => $cobradore,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing cobradore entity.
     *
     */
    public function editAction(Request $request, Cobradores $cobradore)
    {
        $deleteForm = $this->createDeleteForm($cobradore);
        $editForm = $this->createForm('AppBundle\Form\CobradoresType', $cobradore);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('cobradores_edit', array('id' => $cobradore->getId()));
        }

        return $this->render('cobradores/edit.html.twig', array(
            'cobradore' => $cobradore,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a cobradore entity.
     *
     */
    public function deleteAction(Request $request, Cobradores $cobradore)
    {
        $form = $this->createDeleteForm($cobradore);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($cobradore);
            $em->flush($cobradore);
        }

        return $this->redirectToRoute('cobradores_index');
    }

    /**
     * Creates a form to delete a cobradore entity.
     *
     * @param Cobradores $cobradore The cobradore entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Cobradores $cobradore)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('cobradores_delete', array('id' => $cobradore->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
