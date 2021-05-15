<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\VoucherService;
use App\Services\OfferService;
use App\Http\Requests\Api\CreateVoucherRequest;
use App\Http\Requests\Api\ValidateVoucherRequest;
use App\Http\Resources\VoucherResource;
use Illuminate\Support\Facades\Request;

class VoucherApiController extends Controller
{
    private $voucherService, $offerService;

    public function __construct(
        VoucherService $voucherService,
        OfferService $offerService
    )
    {
        $this->voucherService = $voucherService;
        $this->offerService = $offerService;
    }

    /**
     * register vouchers for all clients
     *
     * @param CreateVoucherRequest $request
     */
    public function createVouchersForAllClients(CreateVoucherRequest $request)
    {
        if (!$offer = $this->offerService->getOfferById($request->offer_id)){
            return response()->json(['message' => 'Offer not found'], 404);
        }

        $response = $this->voucherService->createVouchersForAllClients($request->offer_id, $request->expiration_date);

        if ($response) {
            return response()->json(['message' => 'Vouchers successfully registered'], 200);
        }

        return response()->json(['message' => 'Ops! It was not possible to register the vouchers'], 400);
    }

    /**
     * get valid vouchers by email
     *
     * @param string $email
     */
    public function getValidVouchersByEmail($email)
    {
        if (!isset($email)) {
            return response()->json(['message' => 'Email empty.'], 400);
        }

        $vouchers = $this->voucherService->getValidVouchersByEmail($email);

        if (count($vouchers) == 0) {
            return response()->json(['message' => 'Vouchers not found.'], 404);
        }

        return VoucherResource::collection($vouchers);
    }

    /**
     * validate and use a voucher
     *
     * @param ValidateVoucherRequest $request
     */
    public function validateUserVoucher(ValidateVoucherRequest $request)
    {
        if (!$voucher = $this->voucherService->getVoucherByCode($request->code)){
            return response()->json(['message' => 'Voucher not found'], 404);
        }

        if (!is_null($voucher->utilization_date)) {
            return response()->json(['message' => 'Voucher already used'], 400);
        }

        if ($voucher->client->email != $request->email) {
            return response()->json(['message' => 'Unauthorized Resource'], 401);
        }

        $response = $this->voucherService->validateAndUserVoucher($voucher->code);

        return $response;
    }
}
