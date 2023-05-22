<?php

namespace App\Http\Controllers;


use App\Http\Requests\StorePaymentRequest;
use App\Http\Resources\PaymentResource;
use App\Services\PaymentService;
use Illuminate\Contracts\View\View;


class PaymentController extends Controller
{
    /**
     * @var PaymentService
     */
    protected PaymentService $service;

    public function __construct()
    {
        $this->service = new PaymentService();
    }

    /**
     * @return View
     */
    public function index(): View
    {
        return view('home')->with(['payments' => $this->service->index()]);
    }

    /**
     * @param StorePaymentRequest $request
     * @return View
     */
    public function store(StorePaymentRequest $request): View
    {
        $inputs = $request->all();

        switch ($inputs['billingType']) {
            case 'CREDIT_CARD':
                $this->service->storeCreditCard($inputs);
                return view('payments.credit');
                break;

            case 'BOLETO':
                $payment = (new PaymentResource($this->service->storeBoleto($inputs)))->response();
                $payment = json_decode($payment->getContent(), true);
                $payment = $this->service->showBoleto($payment['data']['id']);
                return view('payments.boleto')->with(['payment' => $payment['payment'], 'boleto' => $payment['boleto'] ]);
                break;

            case 'PIX':
                $payment = (new PaymentResource($this->service->storePix($inputs)))->response();
                $payment = json_decode($payment->getContent(), true);
                $payment = $this->service->showPix($payment['data']['id']);
                return view('payments.pix')->with(['payment' => $payment]);
                break;
        }

        return $this->index();
    }

}
