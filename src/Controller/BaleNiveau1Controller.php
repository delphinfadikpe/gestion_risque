<?php

namespace App\Controller;

use App\Entity\BaleNiveau1;
use App\Form\BaleNiveau1Type;
use App\Repository\BaleNiveau1Repository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/bale/niveau1')]
class BaleNiveau1Controller extends AbstractController
{
    #[Route('/', name: 'app_bale_niveau1_index', methods: ['GET'])]
    public function index(BaleNiveau1Repository $baleNiveau1Repository): Response
    {
        return $this->render('bale_niveau1/index.html.twig', [
            'bale_niveau1s' => $baleNiveau1Repository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_bale_niveau1_new', methods: ['GET', 'POST'])]
    public function new(Request $request, BaleNiveau1Repository $baleNiveau1Repository): Response
    {
        $baleNiveau1 = new BaleNiveau1();
        $form = $this->createForm(BaleNiveau1Type::class, $baleNiveau1);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $baleNiveau1Repository->save($baleNiveau1, true);

            return $this->redirectToRoute('app_bale_niveau1_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('bale_niveau1/new.html.twig', [
            'bale_niveau1' => $baleNiveau1,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_bale_niveau1_show', methods: ['GET'])]
    public function show(BaleNiveau1 $baleNiveau1): Response
    {
        return $this->render('bale_niveau1/show.html.twig', [
            'bale_niveau1' => $baleNiveau1,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_bale_niveau1_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, BaleNiveau1 $baleNiveau1, BaleNiveau1Repository $baleNiveau1Repository): Response
    {
        $form = $this->createForm(BaleNiveau1Type::class, $baleNiveau1);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $baleNiveau1Repository->save($baleNiveau1, true);

            return $this->redirectToRoute('app_bale_niveau1_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('bale_niveau1/edit.html.twig', [
            'bale_niveau1' => $baleNiveau1,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_bale_niveau1_delete', methods: ['POST'])]
    public function delete(Request $request, BaleNiveau1 $baleNiveau1, BaleNiveau1Repository $baleNiveau1Repository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$baleNiveau1->getId(), $request->request->get('_token'))) {
            $baleNiveau1Repository->remove($baleNiveau1, true);
        }

        return $this->redirectToRoute('app_bale_niveau1_index', [], Response::HTTP_SEE_OTHER);
    }
}
