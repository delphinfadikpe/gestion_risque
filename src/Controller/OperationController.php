<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/operation/gest/op')]
class OperationController extends AbstractController
{
    #[Route('/', name: 'operation')]
    public function index(): Response
    {
        return $this->render('operation/index.html.twig', [
        ]);
    }
}
