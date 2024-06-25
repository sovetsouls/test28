<?php

namespace Tests\Feature;

use App\Models\Car;
use App\Models\Model;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CarControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Тест для создания нового автомобиля
     * @return void
     */
    public function testStoreCar()
    {
        $carData = [
            'model_id' => Model::factory()->create()->id,
            'year' => 2023,
            'mileage' => 10000,
            'color' => 'Red',
        ];

        $response = $this->postJson('/api/cars', $carData);

        $response->assertStatus(201);
        $response->assertJsonStructure([
            'id', 'model_id', 'year', 'mileage', 'color', 'created_at', 'updated_at'
        ]);

        $this->assertDatabaseHas('cars', $carData);
    }

    /**
     * Тест для просмотра информации автомобиля
     * @return void
     */
    public function testShowCar()
    {
        $car = Car::factory()->create();

        $response = $this->getJson("/api/cars/{$car->id}");

        $response->assertStatus(200);
        $response->assertJson($car->toArray());
    }

    /**
     * Тест для обновления информации автомобиля
     * @return void
     */
    public function testUpdateCar()
    {
        $car = Car::factory()->create();
        $updatedData = [
            'model_id' => Model::factory()->create()->id,
            'year' => 2024,
            'mileage' => 20000,
            'color' => 'Blue',
        ];

        $response = $this->patchJson("/api/cars/{$car->id}", $updatedData);

        $response->assertStatus(200);
        $response->assertJsonStructure([
            'id', 'model_id', 'year', 'mileage', 'color', 'created_at', 'updated_at'
        ]);

        $this->assertDatabaseHas('cars', $updatedData);
    }

    /**
     * Тест для удаления записи автомобиля
     * @return void
     */
    public function testDestroyCar()
    {
        $car = Car::factory()->create();

        $this->assertDatabaseHas('cars', ['id' => $car->id, 'deleted_at' => null]);

        $response = $this->deleteJson("/api/cars/{$car->id}");

        $response->assertStatus(204);
        $this->assertDatabaseHas('cars', ['id' => $car->id]);
        $this->assertNotNull($car->refresh()->deleted_at);
        $this->assertSoftDeleted('cars', ['id' => $car->id]);
    }
}
