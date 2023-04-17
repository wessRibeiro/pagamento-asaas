<?php

namespace App\Services;

use App\Asaas\Adapter\GuzzleAdapter;
use App\Asaas\Asaas;

class PaymentService
{
    protected Asaas $asaas;

    public function  __construct()
    {
        $this->asaas = new Asaas();
    }

    public function index(): array
    {
        return $this->asaas->payment()->getAll();
    }

    public function showBoleto(string $paymentId){
        $payment['boleto'] = $this->asaas->payment()->getBoleto($paymentId);
        $payment['payment'] = $this->asaas->payment()->getById($paymentId);

        return $payment;
    }

    public function showPix(string $paymentId){
        return $this->asaas->payment()->getPix($paymentId);;
    }
}
