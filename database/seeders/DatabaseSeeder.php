<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Customer;
use App\Services\CustomerService;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    protected CustomerService $service;

    public function __construct()
    {
        $this->service = new CustomerService();
    }

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        foreach ($this->service->index() as $customer){
            Customer::factory()->create([
                'customer_id' => $customer->id,
                'name' => $customer->name,
                'cpfCnpj' => $customer->cpfCnpj,
                'email' => $customer->email,
                'postalCode' => $customer->postalCode??'234567890',
                'addressNumber' => $customer->addressNumber ?? '232',
                'phone' => $customer->phone ?? '234323423423'
            ]);
        }
    }
}
