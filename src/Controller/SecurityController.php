<?php

namespace App\Controller;

    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
    use Symfony\Component\Routing\Annotation\Route;
    use Symfony\Component\HttpFoundation\Request;
    use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
    use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
    use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class SecurityController extends AbstractController
{
    /**
     * @Route("/login", name="login")
     */
    public function login(Request $request, AuthenticationUtils $utils)
    {
        $error = $utils->getLastAuthenticationError();
        $lastUsername = $utils->getLastUsername();
        $this->registerLog();

        return $this->render('security/login.html.twig', [
            'error' => $error,
            'last_username'  => $lastUsername,
            'message' => null,
        ]);
    }

   /**
    * @Route("/logout", name="logout") 
    */ 
    public function logout() {

    }

    private function registerLog() {
        $ip = filter_var($_SERVER['REMOTE_ADDR']);
        $data = "" . PHP_EOL . $ip . "\t\t" . $today = date("F j, Y, g:i a");
        $fp = fopen('logs/log-' . date('Y-m-d') . '.txt', 'a');
        fwrite($fp, $data);
        $fp = fopen('logs/full_log.txt', 'a');
        fwrite($fp, $data);
    }
}
