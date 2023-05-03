<?php

namespace App\Controller;

use App\Entity\Decisioncas;
use App\Form\DecisioncasType;
use App\Repository\DecisioncasRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/decisioncas')]
class DecisioncasController extends AbstractController
{
    #[Route('/', name: 'app_decisioncas_index', methods: ['GET'])]
    public function index(DecisioncasRepository $decisioncasRepository): Response
    {
        return $this->render('decisioncas/index.html.twig', [
            'decisioncas' => $decisioncasRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_decisioncas_new', methods: ['GET', 'POST'])]
    public function new(Request $request, DecisioncasRepository $decisioncasRepository): Response
    {
        $decisionca = new Decisioncas();
        $form = $this->createForm(DecisioncasType::class, $decisionca);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $decisioncasRepository->save($decisionca, true);

            return $this->redirectToRoute('app_decisioncas_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('decisioncas/new.html.twig', [
            'decisionca' => $decisionca,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_decisioncas_show', methods: ['GET'])]
    public function show(Decisioncas $decisionca): Response
    {
        return $this->render('decisioncas/show.html.twig', [
            'decisionca' => $decisionca,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_decisioncas_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Decisioncas $decisionca, DecisioncasRepository $decisioncasRepository): Response
    {
        $form = $this->createForm(DecisioncasType::class, $decisionca);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $decisioncasRepository->save($decisionca, true);

            return $this->redirectToRoute('app_decisioncas_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('decisioncas/edit.html.twig', [
            'decisionca' => $decisionca,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_decisioncas_delete', methods: ['POST'])]
    public function delete(Request $request, Decisioncas $decisionca, DecisioncasRepository $decisioncasRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$decisionca->getId(), $request->request->get('_token'))) {
            $decisioncasRepository->remove($decisionca, true);
        }

        return $this->redirectToRoute('app_decisioncas_index', [], Response::HTTP_SEE_OTHER);
    }
}
