<?php
namespace Database\Factories;
use Illuminate\Database\Eloquent\Factories\Factory;

class SongFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => $this->faker->unique()->name,
            'subscriber_id' => $this->faker->numberBetween(1, 50),
            'box_id' => $this->faker->numberBetween(1, 50),
            'prayerzone' => $this->faker->unique()->name,
            'prayertimedate' => $this->faker->unique()->date,
            'prayertimeseq' => $this->faker->numberBetween(1, 5),
            'prayertime' => $this->faker->unique()->time,
        ];
    }
}
