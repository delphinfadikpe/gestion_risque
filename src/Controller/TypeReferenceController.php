<?php

namespace App\Controller;

use App\Entity\TypeReference;
use App\Form\TypeReferenceType;
use App\Repository\TypeReferenceRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/type/reference')]
class TypeReferenceController extends AbstractController
{
    #[Route('/', name: 'app_type_reference_index', methods: ['GET'])]
    public function index(TypeReferenceRepository $typeReferenceRepository): Response
    {
        return $this->render('type_reference/index.html.twig', [
            'type_references' => $typeReferenceRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_type_reference_new', methods: ['GET', 'POST'])]
    public function new(Request $request, TypeReferenceRepository $typeReferenceRepository): Response
    {
        $typeReference = new TypeReference();
        $form = $this->createForm(TypeReferenceType::class, $typeReference);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $typeReferenceRepository->save($typeReference, true);

            return $this->redirectToRoute('app_type_reference_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('type_reference/new.html.twig', [
            'type_reference' => $typeReference,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_type_reference_show', methods: ['GET'])]
    public function show(TypeReference $typeReference): Response
    {
        return $this->render('type_reference/show.html.twig', [
            'type_reference' => $typeReference,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_type_reference_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, TypeReference $typeReference, TypeReferenceRepository $typeReferenceRepository): Response
    {
        $form = $this->createForm(TypeReferenceType::class, $typeReference);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $typeReferenceRepository->save($typeReference, true);

            return $this->redirectToRoute('app_type_reference_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('type_reference/edit.html.twig', [
            'type_reference' => $typeReference,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_type_reference_delete', methods: ['POST'])]
    public function delete(Request $request, TypeReference $typeReference, TypeReferenceRepository $typeReferenceRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$typeReference->getId(), $request->request->get('_token'))) {
            $typeReferenceRepository->remove($typeReference, true);
        }

        return $this->redirectToRoute('app_type_reference_index', [], Response::HTTP_SEE_OTHER);
    }
}
