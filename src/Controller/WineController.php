<?php

namespace App\Controller;

use App\Entity\Wine;
use App\Repository\CategoryRepository;
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
        private readonly WineRepository $wineRepository,
        private readonly CategoryRepository $categoryRepository,
    )
    {
    }

    #[Route('/', name: 'index')]
    public function index(Request $request): Response
    {
        $wines = Pagerfanta::createForCurrentPageWithMaxPerPage(
            new ArrayAdapter($this->wineRepository->findBy(['status' => 'available'])),
            $request->query->get('page', 1),
            3
        );
        return $this->render('wine/index.html.twig', [
            'wines' => $wines,
        ]);
    }
    #[Route('/red', name: 'index.red')]
    public function red(Request $request): Response
    {
        $redWine = $this->categoryRepository->findOneBy(['slug' => 'red-wine']);
        $wines = Pagerfanta::createForCurrentPageWithMaxPerPage(
            new ArrayAdapter($this->wineRepository->findBy(['status' => 'available', 'category' => $redWine->getId()])),
            $request->query->get('page', 1),
            3
        );
        return $this->render('wine/index.html.twig', [
            'wines' => $wines,
        ]);
    }
    #[Route('/white', name: 'index.white')]
    public function white(Request $request): Response
    {
        $whiteWine = $this->categoryRepository->findOneBy(['slug' => 'white-wine']);
        $wines = Pagerfanta::createForCurrentPageWithMaxPerPage(
            new ArrayAdapter($this->wineRepository->findBy(['status' => 'available', 'category' => $whiteWine->getId()])),
            $request->query->get('page', 1),
            3
        );
        return $this->render('wine/index.html.twig', [
            'wines' => $wines,
        ]);
    }
    #[Route('/white', name: 'index.champagnes')]
    public function champagnes(Request $request): Response
    {
        $Champagne = $this->categoryRepository->findOneBy(['slug' => 'champagne']);
        $wines = Pagerfanta::createForCurrentPageWithMaxPerPage(
            new ArrayAdapter($this->wineRepository->findBy(['status' => 'available', 'category' => $whiteWine->getId()])),
            $request->query->get('page', 1),
            3
        );
        return $this->render('wine/index.html.twig', [
            'wines' => $wines,
        ]);
    }
}
