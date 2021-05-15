<?php

namespace App\Repositories\Contracts;

interface OfferRepositoryInterface
{
    public function getOfferById(int $ooferId);
    public function getAll();
}