<?php

namespace App\Http\Controllers;


use App\Services\CustomerService;

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
        return response()->json($this->service->index(), 200);
    }

}
