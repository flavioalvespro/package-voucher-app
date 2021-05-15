<?php

namespace App\Services;

use App\Repositories\Contracts\VoucherRepositoryInterface;
use App\Repositories\Contracts\ClientRepositoryInterface;

class VoucherService
{
    private $voucherRepository, $clientRepository;

    public function __construct(
        VoucherRepositoryInterface $voucherRepository,
        ClientRepositoryInterface $clientRepository
    )
    {
        $this->voucherRepository = $voucherRepository;
        $this->clientRepository = $clientRepository;
    }

    /**
     * register vouchers for all clients
     *
     * @param integer $offerId
     * @param string $expirationDate
     * @return bool
     */
    public function createVouchersForAllClients(int $offerId, string $expirationDate)
    {
        $clients = $this->clientRepository->getAllClients();

        if (count($clients) > 0) {
            foreach($clients as $client){
                $this->voucherRepository->createVoucher($client->id, $offerId, $expirationDate);
            }
        } else {
            return false;
        }

        return true;
    }

    /**
     * return all vouchers of client by email
     *
     * @param string $email
     * @return Collection|Voucher[]
     */
    public function getValidVouchersByEmail(string $email)
    {
        return $this->voucherRepository->getValidVouchersByEmail($email);
    }

    /**
     * get voucher by code
     *
     * @param string $code
     * @return Collection|Voucher
     */
    public function getVoucherByCode(string $code)
    {
        return $this->voucherRepository->getVoucherByCode($code);
    }

    /**
     * validate and use a voucher
     *
     * @param string $code
     * @return array
     */
    public function validateAndUserVoucher(string $code)
    {
        $voucher = $this->getVoucherByCode($code);
        $voucher->utilization_date = now();
        $voucher->save();

        $response = [
            'voucher_code' => $voucher->code,
            'percentage_discount' => $voucher->offer->percentage_discount,
            'utilized_in' => $voucher->utilization_date
        ];

        return $response;
    }
}