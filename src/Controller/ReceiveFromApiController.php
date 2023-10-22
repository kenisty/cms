<?php

namespace App\Controller;

use App\Service\Transfer\ReceiveFromApi;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ReceiveFromApiController extends AbstractController
{
    public function __construct(
        private readonly ReceiveFromApi $receiveFromApi,
    ) { }

    #[Route('/api/receive', name: 'app_receive_from_api', methods: ['POST'])]
    public function index(Request $request): Response
    {
        $this->receiveFromApi->writeToDatabase(json_decode($request->getContent(), true));

        return new Response('received!');
    }
}
