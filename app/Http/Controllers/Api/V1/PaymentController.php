<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;
use App\Services\Api\V1\CustomerService;

class CustomerController extends Controller
{
    protected CustomerService $service;

    function __construct()
    {
        $this->service = new CustomerService();
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
    public function store(StoreCustomerRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCustomerRequest $request, Customer $customer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        //
    }
}
