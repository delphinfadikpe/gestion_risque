<?php

namespace App\Controller;

use App\Entity\BaleNiveau3;
use App\Form\BaleNiveau3Type;
use App\Repository\BaleNiveau3Repository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/bale/niveau3')]
class BaleNiveau3Controller extends AbstractController
{
    #[Route('/', name: 'app_bale_niveau3_index', methods: ['GET'])]
    public function index(BaleNiveau3Repository $baleNiveau3Repository): Response
    {
        return $this->render('bale_niveau3/index.html.twig', [
            'bale_niveau3s' => $baleNiveau3Repository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_bale_niveau3_new', methods: ['GET', 'POST'])]
    public function new(Request $request, BaleNiveau3Repository $baleNiveau3Repository): Response
    {
        $baleNiveau3 = new BaleNiveau3();
        $form = $this->createForm(BaleNiveau3Type::class, $baleNiveau3);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $baleNiveau3Repository->save($baleNiveau3, true);

            return $this->redirectToRoute('app_bale_niveau3_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('bale_niveau3/new.html.twig', [
            'bale_niveau3' => $baleNiveau3,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_bale_niveau3_show', methods: ['GET'])]
    public function show(BaleNiveau3 $baleNiveau3): Response
    {
        return $this->render('bale_niveau3/show.html.twig', [
            'bale_niveau3' => $baleNiveau3,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_bale_niveau3_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, BaleNiveau3 $baleNiveau3, BaleNiveau3Repository $baleNiveau3Repository): Response
    {
        $form = $this->createForm(BaleNiveau3Type::class, $baleNiveau3);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $baleNiveau3Repository->save($baleNiveau3, true);

            return $this->redirectToRoute('app_bale_niveau3_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('bale_niveau3/edit.html.twig', [
            'bale_niveau3' => $baleNiveau3,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_bale_niveau3_delete', methods: ['POST'])]
    public function delete(Request $request, BaleNiveau3 $baleNiveau3, BaleNiveau3Repository $baleNiveau3Repository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$baleNiveau3->getId(), $request->request->get('_token'))) {
            $baleNiveau3Repository->remove($baleNiveau3, true);
        }

        return $this->redirectToRoute('app_bale_niveau3_index', [], Response::HTTP_SEE_OTHER);
    }
}
