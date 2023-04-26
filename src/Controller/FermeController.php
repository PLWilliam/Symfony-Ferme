<?php

namespace App\Controller;

use App\Entity\Ferme;
use App\Form\Ferme1Type;
use App\Repository\FermeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/ferme')]
class FermeController extends AbstractController
{
    #[Route('/', name: 'app_ferme_index', methods: ['GET'])]
    public function index(FermeRepository $fermeRepository): Response
    {
        return $this->render('ferme/index.html.twig', [
            'fermes' => $fermeRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_ferme_new', methods: ['GET', 'POST'])]
    public function new(Request $request, FermeRepository $fermeRepository): Response
    {
        $ferme = new Ferme();
        $form = $this->createForm(Ferme1Type::class, $ferme);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $fermeRepository->save($ferme, true);

            return $this->redirectToRoute('app_ferme_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('ferme/new.html.twig', [
            'ferme' => $ferme,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_ferme_show', methods: ['GET'])]
    public function show(Ferme $ferme): Response
    {
        return $this->render('ferme/show.html.twig', [
            'ferme' => $ferme,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_ferme_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Ferme $ferme, FermeRepository $fermeRepository): Response
    {
        $form = $this->createForm(Ferme1Type::class, $ferme);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $fermeRepository->save($ferme, true);

            return $this->redirectToRoute('app_ferme_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('ferme/edit.html.twig', [
            'ferme' => $ferme,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_ferme_delete', methods: ['POST'])]
    public function delete(Request $request, Ferme $ferme, FermeRepository $fermeRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$ferme->getId(), $request->request->get('_token'))) {
            $fermeRepository->remove($ferme, true);
        }

        return $this->redirectToRoute('app_ferme_index', [], Response::HTTP_SEE_OTHER);
    }
}
