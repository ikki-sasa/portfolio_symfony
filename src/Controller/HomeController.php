<?php

namespace App\Controller;

use App\Repository\ProjectsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function index(ProjectsRepository $projectsRepository): Response
    {
        $projects = $projectsRepository->findAll();
        return $this->render('home/index.html.twig', [
            'projects' => $projects
        ]);
    }
}
