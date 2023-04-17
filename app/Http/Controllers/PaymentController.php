<?php

namespace App\Http\Controllers;


use App\Http\Requests\StorePaymentRequest;
use App\Http\Requests\UpdatePaymentRequest;
use App\Services\PaymentService;

class PaymentController extends Controller
{
    protected PaymentService $service;

    function __construct()
    {
        $this->service = new PaymentService();
    }

    public function index()
    {
        return view('home')->with(['payments' => $this->service->index()]);
    }

    public function showBoleto($id_payment)
    {
        $payment = $this->service->showBoleto($id_payment);
        return view('payments.boleto')->with(['payment' => $payment['payment'], 'boleto' => $payment['boleto'] ]);
    }

    public function showPix($id_payment)
    {
        $payment = $this->service->showPix($id_payment);
        return view('payments.pix')->with(['payment' => $payment]);
    }

}
