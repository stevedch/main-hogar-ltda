<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Users;
use AppBundle\Form\UsersType;
use FOS\UserBundle\Event\GetResponseUserEvent;
use FOS\UserBundle\FOSUserEvents;
use FOS\UserBundle\Model\User;
use FOS\UserBundle\Model\UserManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use FOS\UserBundle\Event\FormEvent;
use Symfony\Component\HttpFoundation\Response;

/**
 * User controller.
 *
 */
class UsersController extends Controller
{
    /**
     * Lists all user entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $users = $em->getRepository('AppBundle:Users')->findAll();

        return $this->render('users/index.html.twig', array(
            'users' => $users,
        ));
    }

    /**
     * Creates a new user entity.
     * @param Request $request
     * @return null|RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function newAction(Request $request)
    {
        $form = $this->createForm(UsersType::class, new Users());

        /** @var $userManager UserManagerInterface */
        $userManager = $this->get('fos_user.user_manager');
        /** @var $dispatcher EventDispatcherInterface */
        $dispatcher = $this->get('event_dispatcher');
        $user = $userManager->createUser();

        $event = new GetResponseUserEvent($user, $request);
        $dispatcher->dispatch(FOSUserEvents::REGISTRATION_INITIALIZE, $event);

        if (null !== $event->getResponse()) {
            return $event->getResponse();
        }

        $form->setData($user);
        $form->handleRequest($request);

        if ($form->isValid()) {

            $event = new FormEvent($form, $request);
            $dispatcher->dispatch(FOSUserEvents::REGISTRATION_SUCCESS, $event);
            $user = $form->getData();
            $user->setEnabled(true);
            $userManager->updateUser($user);

            if (null === $response = $event->getResponse()) {
                $response = $this->redirectToRoute('users_show', ['id' => $user->getId()]);
            }

            //$dispatcher->dispatch(FOSUserEvents::REGISTRATION_COMPLETED, new FilterUserResponseEvent($user, $request, $response));
            return $response;
        }

        //$event = new FormEvent($form, $request);
        //$dispatcher->dispatch(FOSUserEvents::REGISTRATION_FAILURE, $event);

        if (null !== $response = $event->getResponse()) {
            return $response;
        }

        return $this->render('@FOSUser/Registration/register.html.twig',
            array(
                'form' => $form->createView(),
            )
        );
    }

    /**
     * @Route("usuarios/{id}")
     * @ParamConverter("user", class="AppBundle:Users")
     * @param Users $user
     * @return Response
     */
    public function showAction(Users $user)
    {
        return $this->render('users/show.html.twig', array(
            'user' => $user
        ));
    }

    /**
     * @Route("usuarios/{id}")
     * @ParamConverter("user", class="AppBundle:Users")
     * @param Request $request
     * @param Users $user
     * @return Response
     */
    public function editAction(Request $request, Users $user)
    {
        $deleteForm = $this->createDeleteForm($user);
        $editForm = $this->createForm(UsersType::class, $user);
        $editForm->handleRequest($request);

        /** @var $userManager UserManagerInterface */
        $userManager = $this->get('fos_user.user_manager');


        if ($editForm->isSubmitted() && $editForm->isValid()) {

            /** @var Users $data */
            $data = $editForm->getData();

            if (is_null($data->getPlainPassword())) {
                $userManager->updateUser($user);
            }

            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();

            return $this->redirectToRoute('users_index');
        }

        return $this->render('users/edit.html.twig', array(
            'user' => $user,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * @Route("usuarios/{id}")
     * @ParamConverter("user", class="AppBundle:Users")
     * @param Users $user
     * @return Response
     * @internal param Request $request
     */
    public function deleteAction(Users $user)
    {
        $em = $this->getDoctrine()->getManager();
        $user->setStatus(Users::STATUS_INACTIVE);
        $user->setEnabled(0);
        $em->persist($user);
        $em->flush();

        return $this->redirectToRoute('users_index');
    }

    /**
     * Creates a form to delete a user entity.
     *
     * @param Users $user The user entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Users $user)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('users_delete', array('id' => $user->getId())))
            ->setMethod('DELETE')
            ->getForm();
    }
}
