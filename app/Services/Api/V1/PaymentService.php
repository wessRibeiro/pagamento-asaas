<?php

namespace App\Services\Api\V1;

use App\Asaas\Adapter\GuzzleAdapter;
use App\Asaas\Asaas;

class PaymentService
{
    protected GuzzleAdapter $adapter;
    protected Asaas $asaas;

    public function  __construct()
    {
        $this->adapter = new GuzzleAdapter(env('ASSAS_API_KEY'));
        $this->asaas = new Asaas($this->adapter,'homologacao');
    }

    public function index()
    {
        // Retorna a listagem de cobranças
        $customers = $this->asaas->payment()->getAll();

        return $customers;
    }
}
