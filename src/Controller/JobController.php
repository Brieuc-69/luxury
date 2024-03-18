<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
class JobController extends AbstractController
{//liste de tous les jobs
    #[Route('/job', name: 'app_job')]
    public function index(): Response
    {
        return $this->render('job/index.html.twig', [
        ]);
    }


    // #[Route('/job', name: 'app_job')]deuxieme rout e pour le detail d' un job!!!!!!!!!!!!!!!!!!!!!!!!!A FAIRE PAR L4 ID JE PENSE
    // public function index(): Response
    // {
    //     return $this->render('job/index.html.twig', [
    //         'controller_name' => 'JobsController',
    //     ]);
    // }
}