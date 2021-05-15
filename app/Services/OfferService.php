<?php

namespace App\Services;

use App\Repositories\Contracts\OfferRepositoryInterface;

class OfferService
{
    private $offerRepository;

    public function __construct(
        OfferRepositoryInterface $offerRepository
    )
    {
        $this->offerRepository = $offerRepository;
    }

    /**
     * get a offer by id
     *
     * @param int $id
     * @return Collection|Offer
     */
    public function getOfferById(int $id)
    {
        return $this->offerRepository->getOfferById($id);
    }

    /**
     * get all offers
     *
     * @return Collection|Offer[]
     */
    public function getAll()
    {
        return $this->offerRepository->getAll();
    }
}
