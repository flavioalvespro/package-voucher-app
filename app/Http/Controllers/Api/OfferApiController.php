<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\OfferResource;
use App\Services\OfferService;

class OfferApiController extends Controller
{
    private $offerService;

    public function __construct(
        OfferService $offerService
    )
    {
        $this->offerService = $offerService;
    }

    /**
     * get all offers
     *
     */
    public function fetchAll()
    {
        $offers = $this->offerService->getAll();

        if (count($offers) == 0) {
            return response()->json(['message' => 'Offers not found.'], 404);
        }

        return OfferResource::collection($offers);
    }
}
