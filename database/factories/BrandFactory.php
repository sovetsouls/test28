<?php

namespace Database\Factories;

use App\Models\Brand;
use Illuminate\Database\Eloquent\Factories\Factory;

class BrandFactory extends Factory
{
    protected $model = Brand::class;

    /**
     * Марка автомобиля по умолчанию
     * @return array|mixed[]
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->company(),
        ];
    }
}
