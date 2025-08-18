<?php

namespace App\Controller;

use App\Entity\Client;
use App\Repository\InvoiceRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class InvoiceController extends AbstractController
{

    #[Route('clients/{id}/invoices', name: 'client_invoices')]
    public function showInvoices(Client $client): Response
    {
        $invoices = $client->getInvoices();
        return $this->render('invoices.html.twig', [
            'client' => $client,
            'invoices' => $invoices,
        ]);
    }
}
