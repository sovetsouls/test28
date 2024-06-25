<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\CarRequest;
use App\Models\Car;
use Illuminate\Http\JsonResponse;

class CarController extends Controller
{
    /**
     * Отображения списка марок автомобилей
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $cars = Car::with('model.brand')->get();
        return response()->json($cars);
    }

    /**
     * Создание нового автомобиля
     * @param CarRequest $request
     * @return JsonResponse
     */
    public function store(CarRequest $request): JsonResponse
    {
        $car = Car::create($request->validated());
        return response()->json($car, 201);
    }

    /**
     * Возвращаем информацию об конкретном автомобиле
     * @param Car $car
     * @return JsonResponse
     */
    public function show(Car $car): JsonResponse
    {
        return response()->json($car);
    }

    /**
     * Обновляем информацию об конкретном автомобиле
     * @param CarRequest $request
     * @param Car $car
     * @return JsonResponse
     */
    public function update(CarRequest $request, Car $car): JsonResponse
    {
        $car->update($request->validated());
        return response()->json($car);
    }

    /**
     * Удаляем конкретный автомобиль
     * @param Car $car
     * @return JsonResponse
     */
    public function destroy(Car $car): JsonResponse
    {
        $car->delete();
        return response()->json(null, 204);
    }
}
