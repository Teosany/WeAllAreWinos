<?php

namespace App\Controller;

use App\Repository\BoxRepository;
use App\Repository\CategoryRepository;
use App\Repository\WineRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class MainController extends AbstractController
{
    public function __construct(
        private readonly CategoryRepository $categoryRepository,
        private readonly WineRepository $wineRepository,
        private readonly BoxRepository $boxRepository,
    )
    {
    }
    #[Route('/', name: 'index')]
    public function index(): Response
    {
        $slug = 'red';
        $header = $this->categoryRepository->findOneBy(['slug' => $slug]);
        $categories = $this->categoryRepository->findAllExceptThis($slug);
        $wines = $this->wineRepository->findAll();
        $boxes = $this->boxRepository->findAll();

        return $this->render('main/index.html.twig', [
            'header' => $header,
            'categories' => $categories,
            'boxes' => $boxes,
            'wines' => $wines,
        ]);
    }
}
