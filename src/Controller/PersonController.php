<?php
    namespace App\Controller;
    use App\Entity\Person;
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
    use Symfony\Component\Form\Extension\Core\Type\PasswordType;
    use Symfony\Component\Form\Extension\Core\Type\HiddenType;
    use Symfony\Component\Form\Extension\Core\Type\EmailType;
    use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

    class PersonController extends AbstractController
    {
      private $encoder;

      public function __construct(UserPasswordEncoderInterface $encoder) {
          $this->encoder = $encoder;
      }     
      /**
         * @Route("/register", name="register")
         * Method({"GET", "POST"})
         */
        public function register(Request $request)
        {
            $person = new Person();
            $user = new User();
            $form = $this->createFormBuilder($person)
            ->add('id_number', TextType::class, array('attr' => array('placeholder'=> 'Personal ID Number','class' => 'input')))
            ->add('email', EmailType::class, array('attr' => array('placeholder'=> 'Email address', 'class' => 'input')))
            ->add('first_name', TextType::class, array('attr' => array('placeholder'=> 'First name','class' => 'input')))
            ->add('last_name', TextType::class, array('attr' => array('placeholder'=> 'Last name','class' => 'input')))
            ->add('birthdate', TextType::class, array('attr' => array('placeholder'=> 'Birthdate','class' => 'datepicker input')))
            ->add('password', PasswordType::class, array('mapped' => false, 'attr' => array('placeholder'=> 'Password', 'class' => 'input')))
            ->add('password2', PasswordType::class, array('mapped' => false, 'attr' => array('placeholder'=> 'Confirm password', 'class' => 'input')))
            ->add('send', SubmitType::class, array('label' => 'Register NOW!', 'attr' => array('class' => 'btn btn-primary mt-3')))
            ->getForm();

            $form->handleRequest($request);
            if ($form->isSubmitted() && $form->isValid()) {
                try {

                    $entityManager = $this->getDoctrine()->getManager();

                    $email = $request->request->get('form')['email'];
                    $password = $request->request->get('form')['password'];
                    $user = new User();
                    #$user->setId($user_id);
                    $user->setUsername($email);
                    $user->setPassword(
                        $this->encoder->encodePassword($user, $password)
                    );
                    $entityManager->persist($user);
                    $entityManager->flush();
                
                    $entityManager->persist($person);
                    $entityManager->flush();
                
                    #$user_id = $entityManager->getId();
                    #var_dump($user_id);


                    return $this->render('security/login.html.twig', [
                     'error' => null,
                     'message' => "Your user has been created!",
                     'last_username' => null,
                     ]);
                }
                catch(\Exception $e){
                    return $this->render('security/register.html.twig', 
                        array('form' => $form->createView(), 'message'=>"This email is already in use.") 
                    );
                }
            }

            return $this->render('security/register.html.twig', 
                array('form' => $form->createView(), 'message'=>null) 
            );
        }


    }
?>