<?php

namespace App\Services\Api\V1;

class CustomerService
{
    public function index()
    {
        $data = ['teste' => 'teste'];
        return response()->json($data,200);
    }
}
