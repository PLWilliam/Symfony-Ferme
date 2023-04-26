<?php

namespace App\Controller;

use App\Entity\Espece;
use App\Form\Espece1Type;
use App\Repository\EspeceRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/espece')]
class EspeceController extends AbstractController
{
    #[Route('/', name: 'app_espece_index', methods: ['GET'])]
    public function index(EspeceRepository $especeRepository): Response
    {
        return $this->render('espece/index.html.twig', [
            'especes' => $especeRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_espece_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EspeceRepository $especeRepository): Response
    {
        $espece = new Espece();
        $form = $this->createForm(Espece1Type::class, $espece);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $especeRepository->save($espece, true);

            return $this->redirectToRoute('app_espece_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('espece/new.html.twig', [
            'espece' => $espece,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_espece_show', methods: ['GET'])]
    public function show(Espece $espece): Response
    {
        return $this->render('espece/show.html.twig', [
            'espece' => $espece,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_espece_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Espece $espece, EspeceRepository $especeRepository): Response
    {
        $form = $this->createForm(Espece1Type::class, $espece);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $especeRepository->save($espece, true);

            return $this->redirectToRoute('app_espece_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('espece/edit.html.twig', [
            'espece' => $espece,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_espece_delete', methods: ['POST'])]
    public function delete(Request $request, Espece $espece, EspeceRepository $especeRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$espece->getId(), $request->request->get('_token'))) {
            $especeRepository->remove($espece, true);
        }

        return $this->redirectToRoute('app_espece_index', [], Response::HTTP_SEE_OTHER);
    }
}
