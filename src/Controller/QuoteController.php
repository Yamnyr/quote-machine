<?php

namespace App\Controller;

use App\Repository\QuoteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Quote;
use Doctrine\Persistence\ManagerRegistry;

class QuoteController extends AbstractController
{
    #[Route('/quote', name: 'quote_index')]
    public function index(Request $request, QuoteRepository $quoteRepository): Response
    {
        $queryBuilder = $quoteRepository->createQueryBuilder('q');

        $search = $request->query->get('search');
        if (!empty($search)) {
            $queryBuilder->where('q.content LIKE :search')->setParameter('search', '%'.$search.'%');
        }

        return $this->render('quote/index.html.twig', [
            'quotes' => $queryBuilder->getQuery()->getResult()
        ]);
    }

    #[Route('/quote/{id}/delete', name: 'quote_delete')]
    public function delete(ManagerRegistry $doctrine, int $id): Response
    {
        $entityManager = $doctrine->getManager();
        $quote = $entityManager->getRepository(Quote::class)->find($id);

        $entityManager->remove($quote);
        $entityManager->flush();
        return $this->redirectToRoute('quote_index');
    }

    #[Route('/quote/{id}/edit', name: 'quote_edit')]
    public function update(ManagerRegistry $doctrine, int $id, Request $request): Response
    {
        $entityManager = $doctrine->getManager();
        $quote = $entityManager->getRepository(Quote::class)->find($id);

        if (!$quote) {
            throw $this->createNotFoundException(
                'Aucunne citation trouvée pour l\'identifiant '.$id
            );
        }
        if ($request->isMethod('POST')){
            $content = $request->request->get('name');
            $meta = $request->request->get('meta');
            $quote->setContent($content);
            $quote->setMeta($meta);
            $entityManager->flush();
            return $this->redirectToRoute('quote_index');
        }
        return $this->render('quote/edit.html.twig',[
            'quote' => $quote
        ]);
    }

    #[Route('/quote/new', name: 'quote_new')]
    public function new(Request $request, ManagerRegistry $doctrine,): Response
    {
        $content = $request->query->get('content');
        $meta = $request->query->get('meta');

        //$quote->setName('Nouveau nom de produit !');
        //$entityManager->flush();

        return $this->render('quote/edit.html.twig');
    }

}
