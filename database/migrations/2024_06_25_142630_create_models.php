<?php

use App\Models\Model;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('models', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('brand_id')
                ->constrained('brands')
                ->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
        });

        // Массив моделей автомобилей
        $models = [
            ['brand_id' => 1, 'name' => 'Camry'],
            ['brand_id' => 1, 'name' => 'Corolla'],
            ['brand_id' => 1, 'name' => 'RAV4'],
            ['brand_id' => 2, 'name' => 'Civic'],
            ['brand_id' => 2, 'name' => 'Accord'],
            ['brand_id' => 2, 'name' => 'CR-V'],
            ['brand_id' => 3, 'name' => 'F-150'],
            ['brand_id' => 3, 'name' => 'Mustang'],
            ['brand_id' => 3, 'name' => 'Explorer'],
            ['brand_id' => 4, 'name' => 'Silverado'],
            ['brand_id' => 4, 'name' => 'Camaro'],
            ['brand_id' => 4, 'name' => 'Tahoe'],
            ['brand_id' => 5, 'name' => 'Golf'],
            ['brand_id' => 5, 'name' => 'Jetta'],
            ['brand_id' => 5, 'name' => 'Tiguan'],
        ];

        // Добавление записей с моделями автомобилей
        foreach ($models as $model) {
            Model::create($model);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('models');
    }
};
