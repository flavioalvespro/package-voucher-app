<?php

namespace App\Repositories;

use App\Models\Client;
use App\Repositories\Contracts\ClientRepositoryInterface;

class ClientRepository implements ClientRepositoryInterface
{
    private $entity;

    public function __construct(Client $client)
    {
        $this->entity = $client;
    }

    public function getAllClients()
    {
        return $this->entity->all();
    }
}