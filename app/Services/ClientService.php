<?php

namespace App\Services;

use App\Repositories\Contracts\ClientRepositoryInterface;

class ClientService
{
    private $clientRepository;

    public function __construct(
        ClientRepositoryInterface $clientRepository
    )
    {
        $this->clientRepository = $clientRepository;
    }

    /**
     * get all clients
     *
     * @return Collection|Client[]
     */
    public function getClients()
    {
        return $this->clientRepository->getAllClients();
    }
}
