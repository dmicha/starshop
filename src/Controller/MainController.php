<?php

namespace App\Controller;

use App\Repository\StarshipRepository;
use App\Entity\Ships;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class MainController extends AbstractController {
    
    #[Route('/',name:'app_homepage')]
    public function homepage(EntityManagerInterface $entityManager): Response {


        $ships = $entityManager->getRepository(Ships::class)->findAll();
        $myShips = $ships[0];

        return $this->render(
            'main/homepage.html.twig',
            [
                'myShip' => $myShips,
                'ships' => $ships,
            ]
        );
    }
}
