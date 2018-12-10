<?php

namespace App\Http\Controllers;

use App\VoucherManagement;

class VoucherManagementController extends Controller
{
    public function __contruct(VoucherManagement $voucherManagement){
        $this->voucherManagement = $voucherManagement;
    }

    public function index(VoucherManagement $voucherManagement)
    {
        return $voucherManagement->index();
    }

    public function create(VoucherManagement $voucherManagement){

        $voucher = $voucherManagement->create('ikhsan');

        return response()->json($voucher);
    }
}