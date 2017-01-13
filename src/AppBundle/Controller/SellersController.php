<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Sellers;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Seller controller.
 *
 */
class SellersController extends Controller
{
    /**
     * Lists all seller entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $sellers = $em->getRepository('AppBundle:Sellers')->findAll();

        return $this->render('sellers/index.html.twig', array(
            'sellers' => $sellers,
        ));
    }

    /**
     * Creates a new seller entity.
     *
     */
    public function newAction(Request $request)
    {
        $seller = new Sellers();
        $form = $this->createForm('AppBundle\Form\SellersType', $seller);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($seller);
            $em->flush($seller);

            return $this->redirectToRoute('sellers_show', array('id' => $seller->getId()));
        }

        return $this->render('sellers/new.html.twig', array(
            'seller' => $seller,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a seller entity.
     *
     */
    public function showAction(Sellers $seller)
    {
        $deleteForm = $this->createDeleteForm($seller);

        return $this->render('sellers/show.html.twig', array(
            'seller' => $seller,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing seller entity.
     *
     */
    public function editAction(Request $request, Sellers $seller)
    {
        $deleteForm = $this->createDeleteForm($seller);
        $editForm = $this->createForm('AppBundle\Form\SellersType', $seller);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('sellers_edit', array('id' => $seller->getId()));
        }

        return $this->render('sellers/edit.html.twig', array(
            'seller' => $seller,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a seller entity.
     *
     */
    public function deleteAction(Request $request, Sellers $seller)
    {
        $form = $this->createDeleteForm($seller);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($seller);
            $em->flush($seller);
        }

        return $this->redirectToRoute('sellers_index');
    }

    /**
     * Creates a form to delete a seller entity.
     *
     * @param Sellers $seller The seller entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Sellers $seller)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('sellers_delete', array('id' => $seller->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
