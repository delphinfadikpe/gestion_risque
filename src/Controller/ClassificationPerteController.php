<?php

namespace App\Controller;

use App\Entity\ClassificationPerte;
use App\Form\ClassificationPerteType;
use App\Repository\ClassificationPerteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/classification/perte')]
class ClassificationPerteController extends AbstractController
{
    #[Route('/', name: 'app_classification_perte_index', methods: ['GET'])]
    public function index(ClassificationPerteRepository $classificationPerteRepository): Response
    {
        return $this->render('classification_perte/index.html.twig', [
            'classification_pertes' => $classificationPerteRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_classification_perte_new', methods: ['GET', 'POST'])]
    public function new(Request $request, ClassificationPerteRepository $classificationPerteRepository): Response
    {
        $classificationPerte = new ClassificationPerte();
        $form = $this->createForm(ClassificationPerteType::class, $classificationPerte);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $classificationPerteRepository->save($classificationPerte, true);

            return $this->redirectToRoute('app_classification_perte_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('classification_perte/new.html.twig', [
            'classification_perte' => $classificationPerte,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_classification_perte_show', methods: ['GET'])]
    public function show(ClassificationPerte $classificationPerte): Response
    {
        return $this->render('classification_perte/show.html.twig', [
            'classification_perte' => $classificationPerte,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_classification_perte_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, ClassificationPerte $classificationPerte, ClassificationPerteRepository $classificationPerteRepository): Response
    {
        $form = $this->createForm(ClassificationPerteType::class, $classificationPerte);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $classificationPerteRepository->save($classificationPerte, true);

            return $this->redirectToRoute('app_classification_perte_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('classification_perte/edit.html.twig', [
            'classification_perte' => $classificationPerte,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_classification_perte_delete', methods: ['POST'])]
    public function delete(Request $request, ClassificationPerte $classificationPerte, ClassificationPerteRepository $classificationPerteRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$classificationPerte->getId(), $request->request->get('_token'))) {
            $classificationPerteRepository->remove($classificationPerte, true);
        }

        return $this->redirectToRoute('app_classification_perte_index', [], Response::HTTP_SEE_OTHER);
    }
}
