<?php

namespace Database\Factories;

use App\Models\Brand;
use App\Models\Model;
use Illuminate\Database\Eloquent\Factories\Factory;

class ModelFactory extends Factory
{
    protected $model = Model::class;

    /**
     * Модель автомобиля по умолчанию
     * @return array|mixed[]
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->word(),
            'brand_id' => Brand::factory(),
        ];
    }
}
