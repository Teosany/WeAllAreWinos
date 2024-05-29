<?php

namespace App\Controller;

use App\Repository\CategoryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class MainController extends AbstractController
{
    public function __construct(private CategoryRepository $categoryRepository)
    {
    }
    #[Route('/', name: 'index')]
    public function index(): Response
    {
        $slug = 'red-wine';
        $header = $this->categoryRepository->findOneBy(['slug' => $slug]);
        $categories = $this->categoryRepository->findAllExceptThis($slug);

        return $this->render('main/index.html.twig', [
            'header' => $header,
            'categories' => $categories,
        ]);
    }
}
