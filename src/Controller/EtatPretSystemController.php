<?php

namespace App\Controller;

use App\Entity\EtatPretSystem;
use App\Form\EtatPretSystemType;
use App\Repository\EtatPretSystemRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/etat/pret/system')]
class EtatPretSystemController extends AbstractController
{
    #[Route('/', name: 'app_etat_pret_system_index', methods: ['GET'])]
    public function index(EtatPretSystemRepository $etatPretSystemRepository): Response
    {
        return $this->render('etat_pret_system/index.html.twig', [
            'etat_pret_systems' => $etatPretSystemRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_etat_pret_system_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EtatPretSystemRepository $etatPretSystemRepository): Response
    {
        $etatPretSystem = new EtatPretSystem();
        $form = $this->createForm(EtatPretSystemType::class, $etatPretSystem);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $etatPretSystemRepository->save($etatPretSystem, true);

            return $this->redirectToRoute('app_etat_pret_system_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('etat_pret_system/new.html.twig', [
            'etat_pret_system' => $etatPretSystem,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_etat_pret_system_show', methods: ['GET'])]
    public function show(EtatPretSystem $etatPretSystem): Response
    {
        return $this->render('etat_pret_system/show.html.twig', [
            'etat_pret_system' => $etatPretSystem,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_etat_pret_system_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, EtatPretSystem $etatPretSystem, EtatPretSystemRepository $etatPretSystemRepository): Response
    {
        $form = $this->createForm(EtatPretSystemType::class, $etatPretSystem);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $etatPretSystemRepository->save($etatPretSystem, true);

            return $this->redirectToRoute('app_etat_pret_system_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('etat_pret_system/edit.html.twig', [
            'etat_pret_system' => $etatPretSystem,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_etat_pret_system_delete', methods: ['POST'])]
    public function delete(Request $request, EtatPretSystem $etatPretSystem, EtatPretSystemRepository $etatPretSystemRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$etatPretSystem->getId(), $request->request->get('_token'))) {
            $etatPretSystemRepository->remove($etatPretSystem, true);
        }

        return $this->redirectToRoute('app_etat_pret_system_index', [], Response::HTTP_SEE_OTHER);
    }
}
