<?php
namespace Database\Factories;
use Illuminate\Database\Eloquent\Factories\Factory;

class SubscriberFactory extends Factory
{
    public function definition(): array
    {
        $names = ['The Café', 'My Restaurant'];
        return [
            'name' => $names[$this->faker->numberBetween(0, 1)], // Select one of the two names randomly
        ];

    }
}
