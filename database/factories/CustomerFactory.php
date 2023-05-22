<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'customer_id' => null,
            'name' => fake()->name(),
            'cpfCnpj' => '2323232323232',
            'email' => fake()->email(),
            'postalCode' => '12333-333',
            'addressNumber' => fake()->buildingNumber(),
            'phone' => fake()->phoneNumber()
        ];
    }
}
