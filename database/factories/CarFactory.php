<?php

namespace Database\Factories;

use App\Models\Car;
use App\Models\Model;
use Illuminate\Database\Eloquent\Factories\Factory;

class CarFactory extends Factory
{
    protected $model = Car::class;

    /**
     * Автомобиль по умолчанию
     * @return array|mixed[]
     */
    public function definition()
    {
        return [
            'model_id' => Model::factory(),
            'year' => $this->faker->numberBetween(1900, 2024),
            'mileage' => $this->faker->numberBetween(0, 200000),
            'color' => $this->faker->colorName(),
        ];
    }
}
