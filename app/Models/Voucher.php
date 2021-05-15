<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Voucher extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'code', 'expiration_date', 'utilization_date', 'client_id', 'offer_id'
    ];

    /**
     * client of voucher
     *
     */
    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    /**
     * offer of voucher
     *
     */
    public function offer()
    {
        return $this->belongsTo(Offer::class);
    }
}
