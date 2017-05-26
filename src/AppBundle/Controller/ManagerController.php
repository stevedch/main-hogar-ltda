<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Customers;
use AppBundle\Entity\Details;
use AppBundle\Entity\Products;
use AppBundle\Entity\Supplier;
use AppBundle\Form\DetailsType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Config\Definition\Exception\Exception;
use Symfony\Component\HttpFoundation\Request;

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

    public function productsAction()
    {

        $em = $this->getDoctrine()->getManager();
        $products = $em->getRepository(Products::class)->findAll();

        return $this->render('operators/products/index.html.twig', array(
            'products' => $products
        ));
    }

    /**
     * @Route("manager/{id}")
     * @ParamConverter("product", class="AppBundle:Products")
     * @param Products $product
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function showProductAction(Products $product)
    {

        return $this->render('manager/products/show.html.twig', array(
            'product' => $product
        ));
    }

    /**
     * @param Details $details
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function showAction(Details $details)
    {

        return $this->render('manager/show.html.twig', array());
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

                return $this->redirectToRoute('manager_show', array('id' => $details->getId()));
            }
        } catch (Exception $e) {

            throw new Exception($e->getMessage());
        }

        return $this->render('manager/register.html.twig', array(
            'create_form' => $form->createView()
        ));
    }
}
