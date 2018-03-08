<?php
namespace App\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
class SecurityController extends Controller
{
    /**
     *
     * @Route("/login")
     * @Method("GET")
     */
    public function loginAction(AuthenticationUtils $auth): Response
    {
        return $this->render('security/login.html.twig', [
            'lastUsername' => $auth->getLastUsername(),
            'error' => $auth->getLastAuthenticationError(),
        ]);
    }

    /**
     * @Route("/login_check")
     * @Method("POST")
     *
     * @throws \Exception
     */
    public function loginCheck()
    {
        throw new \Exception('this method must never be called ');
    }

    /**
     * @Route("/logout")
     * @Method("GET")
     *
     * @throws \Exception
     */
    public function logoutAction()
    {
        throw new \Exception('this method must never be called even to log out');
    }
}
