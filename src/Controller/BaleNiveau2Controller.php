<?php

namespace App\Controller;

use App\Entity\BaleNiveau2;
use App\Form\BaleNiveau2Type;
use App\Repository\BaleNiveau2Repository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/bale/niveau2')]
class BaleNiveau2Controller extends AbstractController
{
    #[Route('/', name: 'app_bale_niveau2_index', methods: ['GET'])]
    public function index(BaleNiveau2Repository $baleNiveau2Repository): Response
    {
        return $this->render('bale_niveau2/index.html.twig', [
            'bale_niveau2s' => $baleNiveau2Repository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_bale_niveau2_new', methods: ['GET', 'POST'])]
    public function new(Request $request, BaleNiveau2Repository $baleNiveau2Repository): Response
    {
        $baleNiveau2 = new BaleNiveau2();
        $form = $this->createForm(BaleNiveau2Type::class, $baleNiveau2);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $baleNiveau2Repository->save($baleNiveau2, true);

            return $this->redirectToRoute('app_bale_niveau2_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('bale_niveau2/new.html.twig', [
            'bale_niveau2' => $baleNiveau2,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_bale_niveau2_show', methods: ['GET'])]
    public function show(BaleNiveau2 $baleNiveau2): Response
    {
        return $this->render('bale_niveau2/show.html.twig', [
            'bale_niveau2' => $baleNiveau2,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_bale_niveau2_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, BaleNiveau2 $baleNiveau2, BaleNiveau2Repository $baleNiveau2Repository): Response
    {
        $form = $this->createForm(BaleNiveau2Type::class, $baleNiveau2);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $baleNiveau2Repository->save($baleNiveau2, true);

            return $this->redirectToRoute('app_bale_niveau2_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('bale_niveau2/edit.html.twig', [
            'bale_niveau2' => $baleNiveau2,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_bale_niveau2_delete', methods: ['POST'])]
    public function delete(Request $request, BaleNiveau2 $baleNiveau2, BaleNiveau2Repository $baleNiveau2Repository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$baleNiveau2->getId(), $request->request->get('_token'))) {
            $baleNiveau2Repository->remove($baleNiveau2, true);
        }

        return $this->redirectToRoute('app_bale_niveau2_index', [], Response::HTTP_SEE_OTHER);
    }
}
