<?php

namespace App\Controller;

use App\Repository\StarshipRepository;
use App\Entity\Ships;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class StarshipController extends AbstractController {
    #[Route('/starships/{id<\d+>}', name: 'app_starship_show')]
    public function show(EntityManagerInterface $entityManager, int $id): Response {

        $ship =  $entityManager->getRepository(Ships::class)->find($id);

        if (!$ship) {
            throw $this->createNotFoundException('Starship not found');
        }
        return $this->render('starship/show.html.twig', [
            'ship' => $ship,
        ]);
    }
}
