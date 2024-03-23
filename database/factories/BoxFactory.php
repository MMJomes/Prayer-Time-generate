<?php
namespace Database\Factories;
use Illuminate\Database\Eloquent\Factories\Factory;

class BoxFactory extends Factory
{
    public function definition(): array
    {
        return [
                'name' => $this->faker->randomElement(['Orchard Tower', 'United Square', 'Thompson Plaza', 'Peranakan Place']),
                'prayerzone' => $this->faker->randomElement(['WLY01', 'SWK02', 'JHR01', 'KDH01']),
                'subscriber_id' => $this->faker->randomElement([1, 2]),

        ];
    }
}
