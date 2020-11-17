<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/api")
 */
class ApiController extends AbstractController
{
     /**
     * @Route("/navpages", name="navpages", methods="GET")
     */
    public function navpages()
    {
        $pages = 
        [
            [
                "route" => "",
                "label" => "Accueil",
<<<<<<< HEAD
                "id" => 1
=======
>>>>>>> a0faf4e48419dd4c699bdb7e940bd5f1a49c21f6
            ],
            [
                "route" => "mon-compte",
                "label" => "Mon Compte",
<<<<<<< HEAD
                "id" => 2
=======
>>>>>>> a0faf4e48419dd4c699bdb7e940bd5f1a49c21f6
            ],
            [
                "route" => "a-propos",
                "label" => "A propos",
<<<<<<< HEAD
                "id" => 3
=======
>>>>>>> a0faf4e48419dd4c699bdb7e940bd5f1a49c21f6
            ]
            
        ];
        return $this->json($pages, $status = 200, $pages, $context = []);
    }
}
