<?php
namespace App\Controller\api;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use FOS\RestBundle\View\View;
use FOS\RestBundle\Controller\Annotations as FOSRest;
use App\Entity\Donation;
/**
 * Brand controller.
 *
 * @Route("/api")
 */
class servicexxx extends Controller
{
    /**
     * Lists all Articles.
     * @FOSRest\Get("/donations")
     *
     * @return array
     */
    public function getArticleAction()
    {
        $donations = $this->getDoctrine()->getRepository(Donation::class)->findDonations();
        return View::create($donations, Response::HTTP_OK , []);
    }
}
?>