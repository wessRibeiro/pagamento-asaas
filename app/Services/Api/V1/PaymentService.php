<?php

namespace App\Services\Api\V1;

class PaymentService
{
    public function index()
    {
        $data = ['teste' => 'teste'];
        return response()->json($data,200);
    }
}
