<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ClientResource;
use App\Services\ClientService;

class ClientApiController extends Controller
{
    private $clientService;

    public function __construct(
        ClientService $clientService
    )
    {
        $this->clientService = $clientService;
    }

    /**
     * get all clients
     *
     */
    public function fetchAll()
    {
        $clients = $this->clientService->getClients();

        if (count($clients) == 0) {
            return response()->json(['message' => 'Clients not found.'], 404);
        }

        return ClientResource::collection($clients);
    }
}
