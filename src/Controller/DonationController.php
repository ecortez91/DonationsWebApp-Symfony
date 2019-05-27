<?php
    namespace App\Controller;
    use App\Entity\Donation;
    use App\Entity\User;

    use Symfony\Component\HttpFoundation\Response;
    #use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
    use Symfony\Component\Routing\Annotation\Route;
    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

    use Symfony\Component\HttpFoundation\Request;
    use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
    use Symfony\Bundle\FrameworkBundle\Controller\Controller;
    use Symfony\Component\Form\Extension\Core\Type\TextType;
    use Symfony\Component\Form\Extension\Core\Type\TextareaType;
    use Symfony\Component\Form\Extension\Core\Type\SubmitType;
    use Symfony\Bridge\Doctrine\Form\Type\EntityType;
    use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
    use Symfony\Component\Form\Extension\Core\Type\MoneyType;
    use Symfony\Component\Form\Extension\Core\Type\HiddenType;

    class DonationController extends AbstractController
    {
        /**
         * @Route("/", name="donation_list") 
         * @Method({"GET"}) 
         */
        public function index() {
            $txt = '';
            $txtFull = '';
            $message = '';
            $donations = $this->getDoctrine()->getRepository(Donation::class)->findAllDonations($this->getUser());
            $is_country = $this->getDoctrine()->getRepository(User::class)->findIsCountry($this->getUser());
            [$first] = $this->getDoctrine()->getRepository(User::class)->findFullName($this->getUser()->getUsername());
            $fullname = $first["firstName"] . " " . $first["lastName"];
            if ($is_country) {
                $txt = file_get_contents('logs/log-'. date('Y-m-d') . '.txt');
                $txtFull = file_get_contents('logs/full_log.txt');
            }
            $has_donation_this_month = $this->getDoctrine()->getRepository(Donation::class)->findDonationsPerMonth($this->getUser());
            if ($has_donation_this_month> 0) {
                $message = "You'll be able to donate until next month, thanks for your help!";
            }
            return $this->render('donations/index.html.twig', 
            [
                     'donations' => ($donations),
                     'fullname' => $fullname,
                     'txtFile' => $txt,
                     'txtFileFull' => $txtFull,
                     'message' => $message,
                     'date' => date('Y-m-d'),
                     ]);
        }

        /**
        * @Route("/donation/new", name="new_donation")
        * Method({"GET", "POST"})
        */
        public function new(Request $request) {
            $donation = new Donation();
            $donation->setUser($this->getUser());
            $this_month_donations = $this->getDoctrine()->getRepository(Donation::class)->findDonationsPerMonth($this->getUser());
            if ($this_month_donations > 0) {
                return $this->redirecttoroute('donation_list');
            }

            $user = $this->getUser();
            $form = $this->createFormBuilder($donation)
            ->add('institution', EntityType::class, [
                "empty_data" => null,
                "class" => "App\Entity\Institution"
            ])
            ->add('amount', MoneyType::class, array('attr' => array('class' => 'input', 'placeholder'=>"Enter amount (USD)"), "currency" => "false"))
            ->add('cc_number', HiddenType::class, array('attr' => array('class' => 'input', 'placeholder' => "Enter CC Number"), "required" => false))
            ->add('cc_type', HiddenType::class, array('attr' => array('class' => 'input', 'placeholder' => 'Enter CVV'), "required" => false))
            ->getForm();


            $form->handleRequest($request);

            if($form->isSubmitted() && $form->isValid()) {
               $donation = $form->getData();
               $entityManager = $this->getDoctrine()->getManager();
               $entityManager->persist($donation);
               $entityManager->flush();
               return $this->redirecttoroute('donation_list');
            }

            return $this->render('donations/new.html.twig', array('form' => $form->createView()));
        }


        /**
         * @Route("/donation/{id}", name="donation_show")
         */
        public function show($id) {
            $donation = $this->getDoctrine()->getRepository(Donation::class)->find($id);
            return $this->render('donations/show.html.twig', array ('donation' => $donation));;
        }

         protected function getUserId(UserInterface $user)
         {
             $userId = $user->getId();
             return $userId;
         }
    }
?>