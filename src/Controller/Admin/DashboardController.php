<?php

namespace App\Controller\Admin;

use App\Entity\Box;
use App\Entity\Category;
use App\Entity\GrapeVariety;
use App\Entity\Supplier;
use App\Entity\Tag;
use App\Entity\Wine;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use http\Client\Curl\User;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        $routeBuilder = $this->container->get(AdminUrlGenerator::class);
        $url = $routeBuilder->setController(WineCrudController::class)->generateUrl();

        return $this->redirect($url);
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('WeAllAreWinos');
    }

    public function configureCrud(): Crud
    {
        return Crud::new()
            // this defines the pagination size for all CRUD controllers
            // (each CRUD controller can override this value if needed)
            ->setPaginatorPageSize(10)
            ->setDefaultSort(['id' => 'DESC']);
//            ->setTimezone('Europe/Paris');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linktoRoute('Back to the website', 'fas fa-home', 'index');
        yield MenuItem::linkToCrud('Boxes', 'fa-solid fa-box', Box::class);
        yield MenuItem::linkToCrud('Category\'s', 'fa-solid fa-list', Category::class);
        yield MenuItem::linkToCrud('GrapeVariety', 'fa-solid fa-plant-wilt', GrapeVariety::class);
        yield MenuItem::linkToCrud('Suppliers', 'fa-solid fa-truck-field', Supplier::class);
        yield MenuItem::linkToCrud('Tags', 'fa-solid fa-tag', Tag::class);
        yield MenuItem::linkToCrud('Wine', 'fa-solid fa-wine-bottle', Wine::class);
    }
}
