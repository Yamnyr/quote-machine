<?php

namespace App\Controller;

use App\Entity\Quote;

use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class QuoteController extends AbstractController
{
    #[Route('/quote', name: 'quote_index')]

    public function index(ManagerRegistry $doctrine, Request $request ): Response
    {
        $repository = $doctrine->getRepository(quote::class);
        $quote = $repository->findAll();
        $search = $request->query->get('search');
        if (!empty($search)) {
            $quotes = $repository->findOneByContent('$search');
            $quotes = array_filter($quotes, function(array $quote) use ($search) {
                return str_contains(strtolower($quote['content']), strtolower($search));
            });
        }
        else{
            return $this->render('quote/index.html.twig', ['quotes' => $quote]);
        }
        if (!$quote) {
            throw $this->createNotFoundException(
                'No quote found'
            );
        }






/*
    public function index(Request $request): Response
    {
        $quotes = [
            [
                'content' => 'Sire, sire ! On en a gros!',
                'meta' => 'Perceval, Livre II, Les Explotés',
            ],
            [
                'content' => 'SUne pluie de pierres en intérieur donc ! Je vous prenais pour un pied de chaise mais vous êtes un précurseur en fait !',
                'meta' => ' Élias de Kelliwic\'h, Livre IV, Le Privilégié',
            ],
            [
                'content' => 'Je viens de lui mettre une balle dans la tête…… Il m’a regardé de travers.',
                'meta' => 'Tommy Shelby',
            ],
            [
                'content' => 'J’ai pénétré leur lieu d\'habitation de façon subrogative […] en tapinant.',
                'meta' => 'Hervé de Rinel, Livre III, 91 : L’Espion',
            ],
            [
                'content' => '2500 pièces d\'or ???! Eh... eh... c\'est un blague? 2500 pièces d\'or, mais ou voulez vous que j\'trouve 2500 pièces d\'or, dans l\'cul d\'une vache ?!',
                'meta' => ' Seigneur Jacca, Livre I, 21 : La taxe militaire',
            ]
        ];*/

        /*$search = $request->query->get('search');
        if (!empty($search)) {
            $quotes = array_filter($quotes, function(array $quote) use ($search) {
                return str_contains(strtolower($quote['content']), strtolower($search));
            });
        }

        return $this->render('quote/index.html.twig', [
            'quotes' => $quotes,
            'search' => $search,
        ]);*/

    }
}
