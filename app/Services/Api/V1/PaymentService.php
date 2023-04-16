<?php

namespace App\Services\Api\V1;

use App\Asaas\Adapter\GuzzleAdapter;
use App\Asaas\Asaas;

class PaymentService
{
    protected Asaas $asaas;

    public function  __construct()
    {
        $this->asaas = new Asaas();
    }

    public function index()
    {
        // Retorna a listagem de cobranças
        $payments = $this->asaas->payment()->getAll();

        return $payments;
    }

    public function create($payment){

    }
}
