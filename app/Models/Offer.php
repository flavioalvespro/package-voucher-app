<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'percentage_discount'
    ];

    /**
     * vouchers of offer
     *
     */
    public function vouchers()
    {
        return $this->hasMany(Voucher::class);
    }
}
