<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Model;
use Illuminate\Http\JsonResponse;

class ModelController extends Controller
{
    /**
     * Отображения списка машин
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $cars = Model::with('brand')->get();
        return response()->json($cars);
    }
}
