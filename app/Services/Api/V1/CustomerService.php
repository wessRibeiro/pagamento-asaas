<?php

namespace App\Services\Api\V1;

use App\Asaas\Adapter\GuzzleAdapter;
use App\Asaas\Asaas;

class CustomerService
{
    protected Asaas $asaas;

    public function  __construct()
    {
        $this->asaas = new Asaas();
    }

    public function index()
    {
        // Retorna a listagem de clientes
        $customers = $this->asaas->customer()->getAll();

        return $customers;
    }
}
