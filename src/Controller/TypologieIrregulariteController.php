<?php

namespace App\Controller;

use App\Entity\TypologieIrregularite;
use App\Form\TypologieIrregulariteType;
use App\Repository\TypologieIrregulariteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/typologie/irregularite')]
class TypologieIrregulariteController extends AbstractController
{
    #[Route('/', name: 'app_typologie_irregularite_index', methods: ['GET'])]
    public function index(TypologieIrregulariteRepository $typologieIrregulariteRepository): Response
    {
        return $this->render('typologie_irregularite/index.html.twig', [
            'typologie_irregularites' => $typologieIrregulariteRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_typologie_irregularite_new', methods: ['GET', 'POST'])]
    public function new(Request $request, TypologieIrregulariteRepository $typologieIrregulariteRepository): Response
    {
        $typologieIrregularite = new TypologieIrregularite();
        $form = $this->createForm(TypologieIrregulariteType::class, $typologieIrregularite);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $typologieIrregulariteRepository->save($typologieIrregularite, true);

            return $this->redirectToRoute('app_typologie_irregularite_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('typologie_irregularite/new.html.twig', [
            'typologie_irregularite' => $typologieIrregularite,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_typologie_irregularite_show', methods: ['GET'])]
    public function show(TypologieIrregularite $typologieIrregularite): Response
    {
        return $this->render('typologie_irregularite/show.html.twig', [
            'typologie_irregularite' => $typologieIrregularite,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_typologie_irregularite_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, TypologieIrregularite $typologieIrregularite, TypologieIrregulariteRepository $typologieIrregulariteRepository): Response
    {
        $form = $this->createForm(TypologieIrregulariteType::class, $typologieIrregularite);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $typologieIrregulariteRepository->save($typologieIrregularite, true);

            return $this->redirectToRoute('app_typologie_irregularite_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('typologie_irregularite/edit.html.twig', [
            'typologie_irregularite' => $typologieIrregularite,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_typologie_irregularite_delete', methods: ['POST'])]
    public function delete(Request $request, TypologieIrregularite $typologieIrregularite, TypologieIrregulariteRepository $typologieIrregulariteRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$typologieIrregularite->getId(), $request->request->get('_token'))) {
            $typologieIrregulariteRepository->remove($typologieIrregularite, true);
        }

        return $this->redirectToRoute('app_typologie_irregularite_index', [], Response::HTTP_SEE_OTHER);
    }
}
