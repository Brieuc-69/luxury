<?php

namespace App\Controller\Admin;

use App\Entity\Candidat;
use App\Entity\Candidature;
use App\Entity\Experience;
use App\Entity\File;
use App\Entity\Genre;
use App\Entity\JobOffer;
use App\Entity\Metier;
use COM;
use Doctrine\Migrations\Tools\Console\Command\StatusCommand;
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
        // $adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);
        // return $this->redirect($adminUrlGenerator->setController(OneOfYourCrudController::class)->generateUrl());

        // Option 2. You can make your dashboard redirect to different pages depending on the user
        //
        // if ('jane' === $this->getUser()->getUsername()) {
        //     return $this->redirect('...');
        // }

        // Option 3. You can render some custom template to display a proper dashboard with widgets, etc.
        // (tip: it's easier if your template extends from @EasyAdmin/page/content.html.twig)
        //
        return $this->render('admin/dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Luxury');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Candidat',"fa-solid fa-user-plus", Candidat::class);
        yield MenuItem::linkToCrud('Candidature',"fa-solid fa-users", Candidature::class);
        yield MenuItem::linkToCrud('File',"fa-solid fa-image", File::class);
        yield MenuItem::linkToCrud('Experience', "fa-solid fa-star", Experience::class);
        yield MenuItem::linkToCrud('Genre',"fa-solid fa-dna", Genre::class);
        yield MenuItem::linkToCrud('Metier',"fa-solid fa-briefcase", Metier::class);
        yield MenuItem::linkToCrud('JobOffer',"fa-solid fa-user-doctor", JobOffer::class);
    }
}
