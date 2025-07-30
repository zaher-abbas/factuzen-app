<?php

namespace App\Controller;

use App\Entity\Client;
use App\Repository\ClientRepository;
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

    #[Route('/clients/view/{id}', name: 'client')]
    public function showClient(Client $client): Response
    {
        return $this->render('client.html.twig', [
            'client' => $client,
        ]);
    }

    #[Route('/clients/search', name: 'clients-search', methods: ['GET'])]
    public function showClientsByName(ClientRepository $clientRepository, Request $request): Response
    {
        $name = $request->query->get('name');
        $clients = $clientRepository->findClientsByName($name);
        return $this->render('clients.html.twig', [
            'clients' => $clients,
            'searchName' => $name,
        ]);
    }


}
