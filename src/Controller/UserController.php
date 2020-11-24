<?php

namespace App\Controller;

use App\Entity\Bloodsugar;
use App\Entity\User;
use App\Form\BloodsugarType;
use App\Form\UserType;

use Doctrine\ORM\EntityManagerInterface;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserController extends AbstractController
{
    /**
     * @Route("/user/mon-suivi", name="followup")
     */
    public function followup(Request $request, EntityManagerInterface $em, UserPasswordEncoderInterface $encoder)
    {
        // récupération de l'utilisateur en cours
        $user = $this->getUser();

        return $this->render('user/followup.html.twig', [
            "user" => $user]
        );
    }

    // /**
    //  * @Route("/user/ajouter-une-glycemie", name="bloodsugarAdd")
    //  */
    // public function bloodsugarAdd(Request $request, EntityManagerInterface $em)
    // {
    //     $user = $this->getUser();

    //     // création d'un objet Bloodsugar

    //     $bloodsugar = new Bloodsugar;

    //     $form = $this->createForm(BloodsugarType::class, $bloodsugar);

    //     $form->handleRequest($request);


    //     if ($form->isSubmitted() && $form->isValid()) {
    //         $currentRate = $bloodsugar->getRate();

    //         $bloodsugar->setUser($user);
    //         $bloodsugar->setDatetime(new \DateTime());
    //         if ($currentRate > $user->getTargetMin() && $currentRate < $user->getTargetMax()){

    //             $bloodsugar->setScore(1);
    //         }
    //         if ($currentRate < $user->getTargetMin()){

    //             $bloodsugar->setScore(0);

    //         }
    //         if ($currentRate > $user->getTargetMax()){
                
    //             $bloodsugar->setScore(2);
    //         }

    //         $em->persist($bloodsugar);

    //         $em->flush();

    //         return $this->redirectToRoute('followup', ['user' => $user]);
    //     }

    //     // $user = $this->getUser();
    //     return $this->render('user/bloodsugarAdd.html.twig', [
    //         "formView" => $form->createView()
    //     ]);
    // }
}
