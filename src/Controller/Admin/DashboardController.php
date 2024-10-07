<?php

namespace App\Controller\Admin;

use App\Entity\Cinemas;
use App\Entity\Films;
use App\Entity\Reservations;
use App\Entity\Salles;
use App\Entity\Seance;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    #[Route('/admin', name: 'admin')]
    //#[isGranted('ROLE_ADMIN')]
    public function index(): Response
    {

        // Option 1. You can make your dashboard redirect to some common page of your backend
        //
        $adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);
        return $this->redirect($adminUrlGenerator->setController(FilmsCrudController::class)->generateUrl());

    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Untitled');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToCrud('Cinémas', 'fas fa-list', Cinemas::class);
        yield MenuItem::linkToCrud('Films', 'fas fa-list', Films::class);
        yield MenuItem::linkToCrud('Séances', 'fas fa-list', Seance::class);
        yield MenuItem::linkToCrud ('Salles', 'fas fa-list', Salles::class);
        yield MenuItem::linkToCrud('Reservations', 'fas fa-list', Reservations::class);
    }
}