<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class GrapeVarietyController extends AbstractController
{
    #[Route('/grape/variety', name: 'app_grape_variety')]
    public function index(): Response
    {
        return $this->render('grape_variety/index.html.twig', [
            'controller_name' => 'GrapeVarietyController',
        ]);
    }
}
