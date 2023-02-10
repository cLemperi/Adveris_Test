<?php

namespace App\Controller;

use App\Repository\ProjectRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class SearchController extends AbstractController
{
    #[Route('/search-results', name: 'search_results')]
    public function searchAction(ProjectRepository $projectRepository,RequestStack $requestStack): Response
    {
        $searchQuery = $requestStack->getCurrentRequest()->request->get('search_query');
        $results = $projectRepository->findBySearchQuery($searchQuery);

        return $this->render('project/search_result.html.twig', [
            'results' => $results,
            'controller_name' => 'SearchController',
        ]);
    }
}
