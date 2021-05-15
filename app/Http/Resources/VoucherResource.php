<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class VoucherResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'voucher_code' => $this->code,
            'expiration_date' => Carbon::make($this->expiration_date)->format('Y-m-d'),
            'utilized_in' => !is_null($this->utilization_date) ? Carbon::make($this->utilization_date)->format('Y-m-d') : null,
            'client' => $this->client_id ? new ClientResource($this->client) : '',
            'offer' => $this->offer_id ? new OfferResource($this->offer) : ''
        ];
    }
}
