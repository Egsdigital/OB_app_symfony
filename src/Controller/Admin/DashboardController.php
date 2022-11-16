<?php

namespace App\Controller\Admin;

use App\Entity\Partenaires;
use App\Entity\Structures;
use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
       // return parent::index();

        // Option 1. You can make your dashboard redirect to some common page of your backend
        //
         return $this->render('admin/dashboard.html.twig');

        // Option 2. You can make your dashboard redirect to different pages depending on the user
        //
        // if ('jane' === $this->getUser()->getUsername()) {
        //     return $this->redirect('...');
        // }

        // Option 3. You can render some custom template to display a proper dashboard with widgets, etc.
        // (tip: it's easier if your template extends from @EasyAdmin/page/content.html.twig)
        //
        // return $this->render('templates/admin/dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Orange Bleue website');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::section('Comptes utilisateurs',User::class);
        yield MenuItem::subMenu('Les utilisateurs', 'fas fa-list', User::class)->setSubItems([
            MenuItem::linkToCrud('add new user','fas fa-plus',User::class)->setAction(crud::PAGE_NEW),
            MenuItem::linkToCrud('Visualiser les utilisateurs','fas fa-eye',User::class)

        ]);
        yield MenuItem::section('Franchise');
        yield MenuItem::subMenu('Partenaires', 'fas fa-list', Partenaires::class)->setSubItems([
            MenuItem::linkToCrud('Ajouter un nouveau partenaire','fas fa-plus',Partenaires::class)->setAction(crud::PAGE_NEW),
            MenuItem::linkToCrud('Visualiser les partenaires','fas fa-eye',Partenaires::class)
        ]);
        yield MenuItem::section('Structures');
        yield MenuItem::subMenu('Gérer les structures', 'fas fa-list', Structures::class)->setSubItems([
            MenuItem::linkToCrud('Ajouter une nouvelle structure','fas fa-plus',Structures::class)->setAction(crud::PAGE_NEW),
            MenuItem::linkToCrud('Visualiser les structures','fas fa-eye',Structures::class)
        ]);
    }
}
