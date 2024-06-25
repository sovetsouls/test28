<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Car extends Model
{
    use HasFactory;
    use SoftDeletes;

    const TABLE = 'cars';

    protected $table = self::TABLE;
    protected $guarded = ['id'];

    protected $fillable = [
        'model_id',
        'year',
        'mileage',
        'color',
    ];

    /**
     * Отношение к модели машины
     * @return BelongsTo
     */
    public function model(): BelongsTo
    {
        return $this->belongsTo(Model::class);
    }
}
