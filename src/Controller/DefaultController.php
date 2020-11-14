<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;

use Doctrine\ORM\EntityManagerInterface;

use Symfony\Component\Serializer\Serializer;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;


class DefaultController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index()
    {
        return $this->render('default/home.html.twig');
    }
     /**
     * @Route("/signup", name="signup")
     */
    public function signup(Request $request, EntityManagerInterface $em, UserPasswordEncoderInterface $encoder)
    {
        $user = new User();
        $form = $this->createForm(UserType::class, $user);

        $form->handleRequest($request);
        
        if($form->isSubmitted() && $form->isValid()) {

            $user->setPassword($encoder->encodePassword($user, $user->getPassword()));
            $user->setRoles(["ROLE_USER"]);
            $em->persist($user);
            $em->flush();

            return $this->redirectToRoute('app_login', ['user' => $user]);
        }

        return $this->render('default/signup.html.twig', [
            "formView" => $form->createView()
        ]);    
    }
    
    /**
     * @Route("/testapi", name="test_api", methods="GET")
     */
    public function test()
    {
        $testUser = 
        [
            "id" => 2,
            "name" => "Michu",
            "age" => 56,
            "bloodsugertype" => 1,
        ];
        return $this->json($testUser, $status = 200, $testUser, $context = []);
    }

   
}
