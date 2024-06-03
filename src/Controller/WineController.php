<?php

namespace App\Controller;

use App\Entity\Wine;
use App\Repository\WineRepository;
use Pagerfanta\Adapter\ArrayAdapter;
use Pagerfanta\Doctrine\ORM\QueryAdapter;
use Pagerfanta\Pagerfanta;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/wine', name: 'wine.')]
class WineController extends AbstractController
{
    public function __construct(
        private readonly WineRepository $wineRepository
    )
    {
    }

    #[Route('/', name: 'index')]
    public function index(Request $request): Response
    {
        $wines = Pagerfanta::createForCurrentPageWithMaxPerPage(
            new ArrayAdapter($this->wineRepository->findBy(['status' => 'available'])),
            $request->query->get('page', 1),
            1
        );
//        $wines = $this->wineRepository->findBy(['status' => 'available']);
        return $this->render('wine/index.html.twig', [
            'wines' => $wines,
        ]);
    }
}
