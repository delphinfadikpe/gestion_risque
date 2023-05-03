<?php

namespace App\Controller;

use App\Entity\EvaluationtPerte;
use App\Form\EvaluationtPerteType;
use App\Repository\EvaluationtPerteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/evaluationt/perte')]
class EvaluationtPerteController extends AbstractController
{
    #[Route('/', name: 'app_evaluationt_perte_index', methods: ['GET'])]
    public function index(EvaluationtPerteRepository $evaluationtPerteRepository): Response
    {
        return $this->render('evaluationt_perte/index.html.twig', [
            'evaluationt_pertes' => $evaluationtPerteRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_evaluationt_perte_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EvaluationtPerteRepository $evaluationtPerteRepository): Response
    {
        $evaluationtPerte = new EvaluationtPerte();
        $form = $this->createForm(EvaluationtPerteType::class, $evaluationtPerte);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $evaluationtPerteRepository->save($evaluationtPerte, true);

            return $this->redirectToRoute('app_evaluationt_perte_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('evaluationt_perte/new.html.twig', [
            'evaluationt_perte' => $evaluationtPerte,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_evaluationt_perte_show', methods: ['GET'])]
    public function show(EvaluationtPerte $evaluationtPerte): Response
    {
        return $this->render('evaluationt_perte/show.html.twig', [
            'evaluationt_perte' => $evaluationtPerte,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_evaluationt_perte_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, EvaluationtPerte $evaluationtPerte, EvaluationtPerteRepository $evaluationtPerteRepository): Response
    {
        $form = $this->createForm(EvaluationtPerteType::class, $evaluationtPerte);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $evaluationtPerteRepository->save($evaluationtPerte, true);

            return $this->redirectToRoute('app_evaluationt_perte_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('evaluationt_perte/edit.html.twig', [
            'evaluationt_perte' => $evaluationtPerte,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_evaluationt_perte_delete', methods: ['POST'])]
    public function delete(Request $request, EvaluationtPerte $evaluationtPerte, EvaluationtPerteRepository $evaluationtPerteRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$evaluationtPerte->getId(), $request->request->get('_token'))) {
            $evaluationtPerteRepository->remove($evaluationtPerte, true);
        }

        return $this->redirectToRoute('app_evaluationt_perte_index', [], Response::HTTP_SEE_OTHER);
    }
}
