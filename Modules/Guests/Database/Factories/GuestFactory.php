<?php

namespace Modules\Guests\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class GuestFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
    protected $model = \Modules\Guests\App\Models\Guest::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'name'=>fake()->name(),
            'phone'=>fake()->phoneNumber(),
        ];
    }
}

