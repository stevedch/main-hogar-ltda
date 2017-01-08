<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Vendedores;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Vendedore controller.
 *
 */
class VendedoresController extends Controller
{
    /**
     * Lists all vendedore entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $vendedores = $em->getRepository('AppBundle:Vendedores')->findAll();

        return $this->render('vendedores/index.html.twig', array(
            'vendedores' => $vendedores,
        ));
    }

    /**
     * Creates a new vendedore entity.
     *
     */
    public function newAction(Request $request)
    {
        $vendedore = new Vendedores();
        $form = $this->createForm('AppBundle\Form\VendedoresType', $vendedore);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($vendedore);
            $em->flush($vendedore);

            return $this->redirectToRoute('vendedores_show', array('id' => $vendedore->getId()));
        }

        return $this->render('vendedores/new.html.twig', array(
            'vendedore' => $vendedore,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a vendedore entity.
     *
     */
    public function showAction(Vendedores $vendedore)
    {
        $deleteForm = $this->createDeleteForm($vendedore);

        return $this->render('vendedores/show.html.twig', array(
            'vendedore' => $vendedore,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing vendedore entity.
     *
     */
    public function editAction(Request $request, Vendedores $vendedore)
    {
        $deleteForm = $this->createDeleteForm($vendedore);
        $editForm = $this->createForm('AppBundle\Form\VendedoresType', $vendedore);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('vendedores_edit', array('id' => $vendedore->getId()));
        }

        return $this->render('vendedores/edit.html.twig', array(
            'vendedore' => $vendedore,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a vendedore entity.
     *
     */
    public function deleteAction(Request $request, Vendedores $vendedore)
    {
        $form = $this->createDeleteForm($vendedore);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($vendedore);
            $em->flush($vendedore);
        }

        return $this->redirectToRoute('vendedores_index');
    }

    /**
     * Creates a form to delete a vendedore entity.
     *
     * @param Vendedores $vendedore The vendedore entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Vendedores $vendedore)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('vendedores_delete', array('id' => $vendedore->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
