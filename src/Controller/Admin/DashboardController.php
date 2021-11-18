<?php

namespace App\Controller\Admin;

use App\Entity\Categorie;
use App\Entity\Opberger;
use App\Entity\Opslag;
use App\Entity\Producten;
use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        $routeBuilder = $this->get(AdminUrlGenerator::class);

        return $this->redirect($routeBuilder->setController(UserCrudController::class)->generateUrl());
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Shppr');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linktoDashboard('Dashboard', 'fa fa-home');

        yield MenuItem::section("Products");
        yield MenuItem::linkToCrud('Producten', 'fa fa-drumstick-bite', Producten::class);
        yield MenuItem::linkToCrud('Categorie', 'fa fa-list', Categorie::class);

        yield MenuItem::section("Storage");
        yield MenuItem::linkToCrud('Opberger', 'fas fa-boxes', Opberger::class);
        yield MenuItem::linkToCrud('Opslag', 'fas fa-box-open', Opslag::class);
    }
}
