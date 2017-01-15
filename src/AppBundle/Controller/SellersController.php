<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Customers;
use AppBundle\Form\CustomersType;
use AppBundle\Form\DetailsType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use JMS\DiExtraBundle\Annotation as Di;
use AppBundle\Entity\Cellar;
use AppBundle\Entity\Details;
use AppBundle\Entity\Products;
use AppBundle\Entity\Sellers;
use AppBundle\Entity\Supplier;
use AppBundle\Entity\Users;
use AppBundle\Repository\ProductsRepository;
use AppBundle\Form\SupplierType;

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
        return $this->render('sellers/index.html.twig', array(
        ));
    }

    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function registerSupplierAction(Request $request)
    {
        $supplier = new Supplier();

        $form = $this->createForm(SupplierType::class, null);
        $form->handleRequest($request);

        if ($form->isValid()) {

            $em = $this->getDoctrine()->getManager();
            $data = $form->getData();
            $supplier->setName($data['name']);
            $supplier->setAddress($data['address']);
            $em->persist($supplier);

            $cellar = new Cellar();
            /** @var Cellar $dataCellar */
            $dataCellar = $data['cellar'];
            $cellar->setName($dataCellar->getName());
            $em->persist($cellar);

            $product = new Products();
            /** @var Products $dataProduct */
            $dataProduct = $data['product'];
            $product->setName($dataProduct->getName());

            $product->setQuantity($dataProduct->getQuantity());
            $product->setPrice($dataProduct->getPrice());
            $this->calculatePriceNet($product);

            $product->setCellar($cellar);
            $product->setSupplier($supplier);
            $em->persist($product);

            $details = new Details();
            $details->setQuantity($product->getQuantity());

            /** @var Users $user */
            $user = $this->getUser();

            $details->addMetadata('seller', [
                'id' => $user->getId(),
                'fullName' => $user->getFullName()
            ]);

            $details->addMetadata('product', $product);

            $em->persist($details);
            $em->flush();

            return $this->redirectToRoute('sellers_details', array('id' => $details->getId()));
        }

        return $this->render('sellers/register/supplier.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @param Request $request
     * @return Response
     */
    public function recordSaleAction(Request $request)
    {

        $customer = new Customers();
        $form = $this->createForm(CustomersType::class);

        $form->handleRequest($request);

        if ($form->isValid()) {

            $em = $this->getDoctrine()->getManager();

            $data = $form->getData();
            $customer->setRut($data['rut']);
            $customer->setName($data['name']);
            $customer->setLastName($data['lastName']);
            $customer->setMothersLastName($data['mothersLastName']);
            $customer->setHomeAddress($data['homeAddress']);
            $customer->setWorkAddress($data['workAddress']);
            $customer->setFixedNetworkPhone($data['fixedNetworkPhone']);
            $customer->setCellPhone($data['cellPhone']);
            $customer->setEmail($data['email']);
            $customer->setAccountOpeningDate($data['accountOpeningDate']);
            $customer->setAccountNumber($data['accountNumber']);
            $customer->setAuthorizedCredit($data['authorizedCredit']);
            $customer->setPaymentDateAgreed($data['paymentDateAgreed']);
            $customer->setTotalCharge($data['totalCharge']);
            $customer->setTotalDeposit($data['totalDeposit']);
            $em->persist($customer);

            $details = new Details();
            $details->setQuantity($data['quantity']);
            $details->setType(Details::DETAILS_SALE);

            /** @var Users $user */
            $user = $this->getUser();

            $details->addMetadata('seller', [
                'id' => $user->getId(),
                'fullName' => $user->getFullName()
            ]);

            $details->addMetadata('product', $data['product']);

            $details->addMetadata('customer', $customer);
            $em->persist($details);

            $em->flush();

            return $this->redirectToRoute('sellers_customer_sale_details', array('id' => $details->getId()));
        }

        return $this->render('sellers/register/record.sale.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @param Details $details
     * @return Response
     */
    public function detailsRegisterAction(Details $details)
    {
        return $this->render('sellers/details/purchase.html.twig', [
            'detail' => $details
        ]);
    }

    /**
     * @param Details $details
     * @return Response
     */
    public function detailSaleAction(Details $details)
    {
        return $this->render('sellers/details/sale.html.twig', [
            'detail' => $details
        ]);
    }

    /**
     * @param Products $product
     * @return Response
     * @internal param Products $products
     */
    public function showProductAction(Products $product)
    {
        return $this->render('sellers/product/show.html.twig', [
            'product' => $product
        ]);
    }

    /**
     * @return Response
     */
    public function listProductsAction()
    {
        /** @var ProductsRepository $products */
        $products = $this->getDoctrine()
            ->getRepository('AppBundle:Products');

        return $this->render('sellers/product/index.html.twig', [
            'products' => $products->productAll()
        ]);
    }

    /**
     * @return Response
     */
    public function listDetailsAction()
    {
        $em = $this->getDoctrine()->getManager();
        $details = $em->getRepository('AppBundle:Details')->findAll();

        return $this->render('sellers/details/list.html.twig', [
            'details' => $details
        ]);
    }

    /**
     * @return Response
     */
    public function listSaleAction()
    {
        $em = $this->getDoctrine()->getManager();
        $details = $em->getRepository('AppBundle:Details')->findAll();

        return $this->render('sellers/details/list.sale.html.twig', [
            'details' => $details
        ]);
    }

    /**
     * @param Products $products
     * @return Products
     */
    private function calculatePriceNet(Products $products)
    {
        $quantity = $products->getQuantity();
        $price = $products->getPrice();
        $percentage = ($grossPrice = $quantity * $price) * 0.1;
        $priceNet = $grossPrice - $percentage;
        $products->setPriceNet($priceNet);

        return $products;
    }
}
