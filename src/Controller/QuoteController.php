<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class QuoteController extends AbstractController
{
    #[Route('/quote', name: 'quote_index')]
    public function citation(): Response
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
        ];

        return $this->render('quote/index.html.twig', [
            'controller_name' => 'QuoteController',
            'quotes' =>$quotes

        ]);
    }
}
