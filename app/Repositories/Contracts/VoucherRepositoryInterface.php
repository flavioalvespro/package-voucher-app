<?php

namespace App\Repositories\Contracts;

interface VoucherRepositoryInterface
{
    public function createVoucher(int $clientId, int $offerId, string $expirationDate);
    public function getValidVouchersByEmail(string $email);
    public function getVoucherByCode(string $code);
}