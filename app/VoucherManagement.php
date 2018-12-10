<?php

namespace App;

use App\Contracts\Repositories\VoucherRepositoryInterface;

use Illuminate\Support\Str;

use App\Entities\Voucher;

use Carbon\Carbon;

class VoucherManagement
{
    public function __construct(VoucherRepositoryInterface $voucherRepository) {
        $this->voucherRepository = $voucherRepository;
    }

    public function index() {
        return $this->voucherRepository->list();
    }

    public function create(string $username) {

        $voucher = new Voucher([
            'id' => (string) Str::uuid(),
            'title' => 'Title',
            'store' => 'Store',
            'offer' => 'Offer',
            'coin' => (int) 123,
            'expiredAt' => Carbon::now(),
            'codeType' => 'type',
            'createdAt' => Carbon::now(),
            'createdBy' => $username
        ]);

        $this->voucherRepository->save($voucher);

        return $voucher;
    }
}