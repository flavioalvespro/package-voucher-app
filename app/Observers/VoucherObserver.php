<?php

namespace App\Observers;

use App\Models\Voucher;

class VoucherObserver
{
    /**
     * Handle the voucher "created" event.
     *
     * @param  \App\Models\Voucher  $voucher
     * @return void
     */
    public function creating(Voucher $voucher)
    {
        $voucher->code = substr(uniqid(rand(), true), 0, 8);
    }
}
