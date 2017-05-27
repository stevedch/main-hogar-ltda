<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Customers;
use AppBundle\Entity\Details;
use AppBundle\Entity\Products;
use AppBundle\Entity\Supplier;
use AppBundle\Form\DetailsType;
use AppBundle\Repository\ProductsRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Config\Definition\Exception\Exception;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\Serializer;

class OperatorController extends Controller
{

    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction()
    {

        $em = $this->getDoctrine()->getManager();
        $details = $em->getRepository(Details::class)->findAll();

        return $this->render('operators/index.html.twig', array(
            'details' => $details
        ));
    }

    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function productsAction()
    {

        $em = $this->getDoctrine()->getManager();
        $products = $em->getRepository(Products::class)->findAll();

        return $this->render('operators/products/index.html.twig', array(
            'products' => $products
        ));
    }


    /**
     * @return Response
     */
    public function jsonProductsAction()
    {
        $em = $this->getDoctrine()->getManager();

        /** @var ProductsRepository $products */
        $products = $em->getRepository(Products::class);

        /** @var  Serializer $serializer */
        $serializer = $this->get('serializer');
        $data = $serializer->serialize($products->productAll(), 'json');

        return new Response($data);
    }

    /**
     * @Route("operador/{id}")
     * @ParamConverter("product", class="AppBundle:Products")
     * @param Products $product
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function showProductAction(Products $product)
    {
        return $this->render('operators/products/show.html.twig', array(
            'product' => $product
        ));
    }

    /**
     * @param Details $details
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function showAction(Details $details)
    {

        return $this->render('operators/show.html.twig', array());
    }

    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function registerAction(Request $request)
    {
        $rut = $request->request->get('appbundle_details')['customer'];
        $form = $this->createForm(DetailsType::class, null);
        $form->handleRequest($request);

        try {

            if ($form->isValid()) {

                $em = $this->getDoctrine()->getManager();

                /** @var Details $detail */
                $detail = $form->getData();

                $details = new Details();

                $details->setUser($this->getUser());
                $details->setUnitValue($detail->getUnitValue());
                $details->setQuantity($detail->getQuantity());
                $details->setIva($detail->getIva());
                $details->setDiscount($detail->getDiscount());
                $details->setValueTotal($detail->getValueTotal());

                if (!empty($rut['rut'])) {

                    /** @var Customers $customer */
                    $customer = $detail->getCustomer();
                    $customers = new Customers();

                    $customers->setRut($customer->getRut());
                    $customers->setName($customer->getName());
                    $customers->setLastName($customer->getLastName());
                    $customers->setMothersLastName($customer->getMothersLastName());
                    $customers->setAddress($customer->getAddress());
                    $customers->setEmail($customer->getEmail());

                    $details->setType(Details::DETAILS_SALE);
                    $details->setCustomer($customers);
                } else {

                    /** @var Supplier $supplier */
                    $supplier = $detail->getSupplier();

                    $suppliers = new Supplier();
                    $suppliers->setAddress($supplier->getAddress());
                    $suppliers->setName($supplier->getName());

                    /** @var Products $product */
                    $product = $detail->getProduct();
                    $details->setProduct($product);

                    $details->setType(Details::DETAILS_PURCHASE);
                    $details->setSupplier($suppliers);
                }

                $em->persist($details);
                $em->flush();

                return $this->redirectToRoute('operators_show', array('id' => $details->getId()));
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
