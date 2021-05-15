<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email'
    ];

    /**
     * vouchers of client
     *
     */
    public function vouchers()
    {
        return $this->hasMany(Voucher::class);
    }
}
