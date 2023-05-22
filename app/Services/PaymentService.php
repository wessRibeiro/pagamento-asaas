<?php

namespace App\Services;

use App\Asaas\Adapter\GuzzleAdapter;
use App\Asaas\Asaas;
use App\Models\Customer;

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

    public function storeCreditCard($inputs)
    {
        $customer = Customer::first();

        $body = [
            'customer' => $customer->customer_id,
            'billingType' => 'CREDIT_CARD',
            'description' => $inputs['description'],
            'value' => $inputs['value'],
            'dueDate' => date('Y-m-d'),
            'creditCard' => [
                'holderName' => $inputs['holderName'],
                'number' => str_replace(' ', '', trim($inputs['number'])),
                'expiryMonth' => $inputs['expiryMonth'],
                'expiryYear' => $inputs['expiryYear'],
                'ccv' => $inputs['ccv']
            ],
            'creditCardHolderInfo' => [
                'name' => $customer->name,
                'email' => $customer->email,
                'cpfCnpj' => $customer->cpfCnpj,
                'postalCode' => $customer->postalCode,
                'addressNumber' => $customer->addressNumber,
                'phone' => $customer->phone
            ]
        ];

        return $this->asaas->payment()->create($body);

    }

    public function storeBoleto($inputs)
    {
        $customer = Customer::first();

        $body = [
            'customer' => $customer->customer_id,
            'billingType' => 'BOLETO',
            'description' => $inputs['description'],
            'value' => $inputs['value'],
            'dueDate' => date('Y-m-d'),
            'fine' => [
                'value' => 1
            ],
            'interest' => [
                'value' => 2
            ]
        ];

        return $this->asaas->payment()->create($body);
    }

    public function storePix($inputs)
    {
        $customer = Customer::first();

        $body = [
            'customer' => $customer->customer_id,
            'description' => $inputs['description'],
            'billingType' => 'PIX',
            'value' => $inputs['value'],
            'dueDate' => date('Y-m-d'),
        ];

        return $this->asaas->payment()->create($body);
    }

}
