<?php

namespace App\Repositories;

use App\Models\Voucher;
use App\Repositories\Contracts\VoucherRepositoryInterface;
use Illuminate\Support\Facades\DB;

class VoucherRepository implements VoucherRepositoryInterface
{
    private $entity;

    public function __construct(Voucher $voucher)
    {
        $this->entity = $voucher;
    }

    /**
     * register a voucher for a client 
     *
     * @param integer $clientId
     * @param integer $offerId
     * @param string $expirationDate
     * @return Collection|Voucher
     */
    public function createVoucher(int $clientId, int $offerId, string $expirationDate)
    {
        $data = [
            'client_id' => $clientId,
            'offer_id' => $offerId,
            'expiration_date' => $expirationDate
        ];

        $voucher = $this->entity->create($data);

        return $voucher;
    }

    /**
     * return all vouchers of client by email
     *
     * @param string $email
     * @return Collection|Voucher[]
     */
    public function getValidVouchersByEmail(string $email)
    {
        return $this->entity->join('clients', 'clients.id', '=', 'vouchers.client_id')->where('clients.email', $email)->where('vouchers.utilization_date', null)->get();
    }

    /**
     * get voucher by code
     *
     * @param string $code
     * @return Collection|Voucher
     */
    public function getVoucherByCode(string $code)
    {
        return $this->entity->where('code', $code)->first();
    }
}