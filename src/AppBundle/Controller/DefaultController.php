<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Users;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Authorization\AuthorizationChecker;
use Symfony\Component\Security\Core\Exception\AuthenticationException;
use Symfony\Component\Security\Core\Role\Role;
use Symfony\Component\Security\Core\Security;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="login")
     * @Method({"GET", "POST"})
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function loginAction(Request $request)
    {

        /** @var $session \Symfony\Component\HttpFoundation\Session\Session */
        $session = $request->getSession();

        $authErrorKey = Security::AUTHENTICATION_ERROR;
        $lastUsernameKey = Security::LAST_USERNAME;

        if ($request->attributes->has($authErrorKey)) {
            $error = $request->attributes->get($authErrorKey);
        } elseif (null !== $session && $session->has($authErrorKey)) {
            $error = $session->get($authErrorKey);
            $session->remove($authErrorKey);
        } else {
            $error = null;
        }

        if (!$error instanceof AuthenticationException) {
            $error = null;
        }

        $lastUsername = (null === $session) ? '' : $session->get($lastUsernameKey);

        $csrfToken = $this->has('security.csrf.token_manager')
            ? $this->get('security.csrf.token_manager')->getToken('authenticate')->getValue()
            : null;

        if ($user = $this->getUser()) {
            return $this->changeRoute($user);
        }

        return $this->renderLogin(array(
            'last_username' => $lastUsername,
            'error' => $error,
            'csrf_token' => $csrfToken,
        ));
    }

    /**
     * @param array $data
     * @return Response
     */
    protected function renderLogin(array $data)
    {
        return $this->render('@FOSUser/Security/login.html.twig', $data);
    }

    /**
     * @param Users $user
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    private function changeRoute(Users $user)
    {

        $routeName = 'login';

        if ($this->checkRoles($user->getRoles(), 'ROLE_ADMIN_GENERAL')) {
            $routeName = 'users_index';
        } elseif ($this->checkRoles($user->getRoles(), 'ROLE_GERENTE_FINANZAS')) {
            $routeName = '';
        } elseif ($this->checkRoles($user->getRoles(), 'ROLE_GERENTE_FINANZAS')) {
            $routeName = '';
        } elseif ($this->checkRoles($user->getRoles(), 'ROLE_GERENTE_VENTAS')) {
            $routeName = '';
        } elseif ($this->checkRoles($user->getRoles(), 'ROLE_VENDEDOR')) {
            $routeName = 'sellers_index';
        } elseif ($this->checkRoles($user->getRoles(), 'ROLE_COBRADOR')) {
            $routeName = '';
        }

        return $this->redirectToRoute($routeName);
    }

    private function checkRoles(array $roles, $name)
    {
        if (in_array($name, $roles)) {

            return true;
        }

        return false;
    }
}
