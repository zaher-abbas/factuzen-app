<?php

namespace App\Controller;

use App\Entity\Client;
use App\Form\ClientType;
use App\Repository\ClientRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ClientController extends AbstractController
{
    #[Route('/clients', name: 'clients')]
    public function showAllClients(ClientRepository $clientRepository): Response
    {
        $clients = $clientRepository->findAll();
        return $this->render('clients.html.twig', [
            'clients' => $clients,
        ]);
    }

    #[Route('/clients/{id}', name: 'client', priority: -10)]
    public function showClient(Client $client): Response
    {
        return $this->render('client.html.twig', [
            'client' => $client,
        ]);
    }

    #[Route('/clients/search', name: 'clients-search')]
    public function showClientsByName(ClientRepository $clientRepository, Request $request): Response
    {
        $name = $request->query->get('name');
        $clients = $clientRepository->findClientsByName($name);
        return $this->render('clients.html.twig', [
            'clients' => $clients,
            'searchName' => $name,
        ]);
    }

    #[Route('/clients/new', name: 'client_add')]
    public function new(Request $request, EntityManagerInterface $entityManagerInterface): Response
    {
        $client = new Client();
        $form = $this->createForm(ClientType::class, $client);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManagerInterface->persist($client);
            $entityManagerInterface->flush();
            return $this->redirectToRoute('clients');
        }
        return $this->render('newclient.html.twig', [
            'client' => $client,
            'form' => $form,
        ]);
    }

}
