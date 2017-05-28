<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Cart;
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
     * @return Response
     */
    public function jsonCartAllAction()
    {
        $em = $this->getDoctrine()->getManager();

        $cart = $em->getRepository(Cart::class);

        /** @var  Serializer $serializer */
        $serializer = $this->get('serializer');
        $data = $serializer->serialize(['data' => $cart->findAll()], 'json');

        return new Response($data);
    }


    /**
     * @Route("operador/{id}/json-shopping-cart-edit")
     * @ParamConverter("cart", class="AppBundle:Cart")
     * @param Request $request
     * @param Cart $cart
     * @return Response
     */
    public function jsonShoppingUpdateAction(Request $request, Cart $cart)
    {
        $em = $this->getDoctrine()->getManager();
        $quantity = $request->get('quantity');

        try {

            $cart->setRequestedAmount($quantity);
            $em->persist($cart);
            $em->flush();
        } catch (\Exception $e) {

            throw new Exception($e->getMessage());
        }

        return new Response(json_encode(['success', 'ok']));
    }

    /**
     * @Route("operador/{id}")
     * @ParamConverter("cart", class="AppBundle:Cart")
     * @param Cart $cart
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function jsonShoppingDeleteAction(Cart $cart)
    {
        $em = $this->getDoctrine()->getManager();

        try {

            $em->remove($cart);
            $em->flush($cart);

            $cart = $em->getRepository(Cart::class);

            /** @var  Serializer $serializer */
            $serializer = $this->get('serializer');
            $data = $serializer->serialize(['data' => $cart->findAll()], 'json');
        } catch (\Exception $e) {

            throw new Exception($e->getMessage());
        }

        return new Response($data);
    }

    public function jsonShoppingCartAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $data = $request->get('data');

        $cart = $em->getRepository(Cart::class);
        $cart = $cart->findAll();
        $result = array();

        try {

            if (!empty($data)) {

                $em = $this->getDoctrine()->getManager();
                $products = $em->getRepository(Products::class)->findBy(array(
                    'id' => $data
                ));

                if (!empty($cart)) {

                    /** @var Cart $item */
                    foreach ($cart as $item) {

                        $result[$item->getIdProduct()]['id'] = $item->getId();
                        $result[$item->getIdProduct()]['idProduct'] = $item->getIdProduct();
                        $result[$item->getIdProduct()]['name'] = $item->getName();
                        $result[$item->getIdProduct()]['quantity'] = $item->getQuantity();
                        $result[$item->getIdProduct()]['requestedAmount'] = $item->getRequestedAmount();
                        $result[$item->getIdProduct()]['price'] = $item->getPrice();
                    }
                }

                if (!empty($products)) {

                    /** @var  Products $product */
                    foreach ($products as $product) {

                        if (isset($result[$product->getId()])) {

                            /** @var Cart $cart */
                            $cart = $em->find(Cart::class, $result[$product->getId()]['id']);
                            $cart->setRequestedAmount($cart->getRequestedAmount() + 1);
                        } else {

                            $cart = new Cart();
                            $cart->setIdProduct($product->getId());
                            $cart->setName($product->getFullData());
                            $cart->setQuantity($product->getQuantity());
                            $cart->setRequestedAmount(1);
                            $cart->setPrice($product->getPrice());
                        }

                        $em->persist($cart);
                    }

                    $em->flush();
                }
            }
        } catch (\Exception $e) {

            throw  new Exception($e->getMessage());
        }

        $carts = $em->getRepository(Cart::class);
        $carts = $carts->findAll();

        /** @var  Serializer $serializer */
        $serializer = $this->get('serializer');
        $data = $serializer->serialize(['data' => $carts], 'json');

        return new Response($data);
    }

    /**
     * @Route("operador/{id}")
     * @ParamConverter("product", class="AppBundle:Products")
     * @param Products $product
     * @return Response
     */
    public function showProductAction(Products $product)
    {
        return $this->render('operators/products/show.html.twig', array(
            'product' => $product
        ));
    }

    /**
     * @Route("operador/{id}")
     * @ParamConverter("details", class="AppBundle:Details")
     * @param Details $details
     * @return Response
     */
    public function showAction(Details $details)
    {

        var_dump($details->getMetaData());
        exit;

        return $this->render('operators/show.html.twig', array(
            'details' => $details
        ));
    }

    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function registerAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $rut = $request->request->get('appbundle_details')['customer'];
        $form = $this->createForm(DetailsType::class, null);
        $form->handleRequest($request);

        try {

            if ($form->isValid()) {
                
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

                    $carts = $em->getRepository(Cart::class)->findAll();

                    $metaData = array();

                    if (!empty($carts)) {

                        /**@var Cart $item */
                        foreach ($carts as $item) {

                            /** @var Products $product */
                            $product = $em->find(Products::class, $item->getIdProduct());
                            $product->setQuantity(intval($product->getQuantity()) - intval($item->getRequestedAmount()));

                            if (0 >= intval($product->getQuantity())) {

                                $product->setStatus(Products::STATUS_BAD);
                                $product->setQuantity(0);
                                $em->persist($product);
                            }

                            $metaData[$item->getIdProduct()]['idProduct'] = $item->getIdProduct();
                            $metaData[$item->getIdProduct()]['name'] = $item->getName();
                            $metaData[$item->getIdProduct()]['quantity'] = $item->getQuantity();
                            $metaData[$item->getIdProduct()]['requestedAmount'] = $item->getRequestedAmount();
                            $metaData[$item->getIdProduct()]['price'] = $item->getPrice();
                            $em->remove($item);
                        }
                    }

                    $details->setMetaData('products', $metaData);
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
