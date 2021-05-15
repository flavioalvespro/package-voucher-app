<?php

namespace App\Repositories;

use App\Models\Offer;
use App\Repositories\Contracts\OfferRepositoryInterface;

class OfferRepository implements OfferRepositoryInterface
{
    private $entity;

    public function __construct(Offer $offer)
    {
        $this->entity = $offer;
    }

    /**
     * get offer by id
     *
     * @param integer $offerId
     * @return Collection|Offer
     */
    public function getOfferById(int $offerId)
    {
        return $this->entity->find($offerId);
    }

    /**
     * get all offers
     *
     * @return Collection|Offer[]
     */
    public function getAll()
    {
        return $this->entity->all();
    }
}