<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePaymentRequest;
use App\Http\Requests\UpdatePaymentRequest;
use App\Services\Api\V1\PaymentService;

class PaymentController extends Controller
{
    protected PaymentService $service;

    function __construct()
    {
        $this->service = new PaymentService();
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try{
            $data = $this->service->index();
            return $data;
        }catch (\Exception $ex){
            return returnJson($ex);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePaymentRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Payment $payment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePaymentRequest $request, Payment $payment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Payment $payment)
    {
        //
    }
}
