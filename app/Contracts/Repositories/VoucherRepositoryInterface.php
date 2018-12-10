<?php

namespace App\Contracts\Repositories;

use App\Entities\Voucher;

interface VoucherRepositoryInterface
{
    public function list();

    public function save(Voucher $voucher);
}