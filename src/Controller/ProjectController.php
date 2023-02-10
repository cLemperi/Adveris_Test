<?php

namespace App\Controller;

use App\Repository\ProjectRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ProjectController extends AbstractController
{
    #[Route('/project', name: 'app_project')]
    public function index(ProjectRepository $repo): Response
    {
        $listProject = $repo->findAll();

        return $this->render('project/index.html.twig', [
            'projects' => $listProject,
            'controller_name' => 'ProjectController',
        ]);
    }

    #[Route('/project/{id}', name: 'project_show')]
    public function project(ProjectRepository $repo, $id): Response
    {
        $project = $repo->find($id);

        return $this->render('project/Project.html.twig', [
            'project' => $project,
            'controller_name' => 'ProjectController',
        ]);
    }

}
