<?php

namespace App\Controller;

use App\Entity\StatutPerte;
use App\Form\StatutPerteType;
use App\Repository\StatutPerteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/statut/perte')]
class StatutPerteController extends AbstractController
{
    #[Route('/', name: 'app_statut_perte_index', methods: ['GET'])]
    public function index(StatutPerteRepository $statutPerteRepository): Response
    {
        return $this->render('statut_perte/index.html.twig', [
            'statut_pertes' => $statutPerteRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_statut_perte_new', methods: ['GET', 'POST'])]
    public function new(Request $request, StatutPerteRepository $statutPerteRepository): Response
    {
        $statutPerte = new StatutPerte();
        $form = $this->createForm(StatutPerteType::class, $statutPerte);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $statutPerteRepository->save($statutPerte, true);

            return $this->redirectToRoute('app_statut_perte_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('statut_perte/new.html.twig', [
            'statut_perte' => $statutPerte,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_statut_perte_show', methods: ['GET'])]
    public function show(StatutPerte $statutPerte): Response
    {
        return $this->render('statut_perte/show.html.twig', [
            'statut_perte' => $statutPerte,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_statut_perte_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, StatutPerte $statutPerte, StatutPerteRepository $statutPerteRepository): Response
    {
        $form = $this->createForm(StatutPerteType::class, $statutPerte);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $statutPerteRepository->save($statutPerte, true);

            return $this->redirectToRoute('app_statut_perte_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('statut_perte/edit.html.twig', [
            'statut_perte' => $statutPerte,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_statut_perte_delete', methods: ['POST'])]
    public function delete(Request $request, StatutPerte $statutPerte, StatutPerteRepository $statutPerteRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$statutPerte->getId(), $request->request->get('_token'))) {
            $statutPerteRepository->remove($statutPerte, true);
        }

        return $this->redirectToRoute('app_statut_perte_index', [], Response::HTTP_SEE_OTHER);
    }
}
