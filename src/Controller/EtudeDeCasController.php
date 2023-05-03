<?php

namespace App\Controller;

use App\Entity\EtudeDeCas;
use App\Form\EtudeDeCasType;
use App\Repository\EtudeDeCasRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/etude/de/cas')]
class EtudeDeCasController extends AbstractController
{
    #[Route('/', name: 'app_etude_de_cas_index', methods: ['GET'])]
    public function index(EtudeDeCasRepository $etudeDeCasRepository): Response
    {
        return $this->render('etude_de_cas/index.html.twig', [
            'etude_de_cas' => $etudeDeCasRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_etude_de_cas_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EtudeDeCasRepository $etudeDeCasRepository): Response
    {
        $etudeDeCa = new EtudeDeCas();
        $form = $this->createForm(EtudeDeCasType::class, $etudeDeCa);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $etudeDeCasRepository->save($etudeDeCa, true);

            return $this->redirectToRoute('app_etude_de_cas_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('etude_de_cas/new.html.twig', [
            'etude_de_ca' => $etudeDeCa,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_etude_de_cas_show', methods: ['GET'])]
    public function show(EtudeDeCas $etudeDeCa): Response
    {
        return $this->render('etude_de_cas/show.html.twig', [
            'etude_de_ca' => $etudeDeCa,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_etude_de_cas_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, EtudeDeCas $etudeDeCa, EtudeDeCasRepository $etudeDeCasRepository): Response
    {
        $form = $this->createForm(EtudeDeCasType::class, $etudeDeCa);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $etudeDeCasRepository->save($etudeDeCa, true);

            return $this->redirectToRoute('app_etude_de_cas_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('etude_de_cas/edit.html.twig', [
            'etude_de_ca' => $etudeDeCa,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_etude_de_cas_delete', methods: ['POST'])]
    public function delete(Request $request, EtudeDeCas $etudeDeCa, EtudeDeCasRepository $etudeDeCasRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$etudeDeCa->getId(), $request->request->get('_token'))) {
            $etudeDeCasRepository->remove($etudeDeCa, true);
        }

        return $this->redirectToRoute('app_etude_de_cas_index', [], Response::HTTP_SEE_OTHER);
    }
}
