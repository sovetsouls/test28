<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Brand extends Model
{
    use HasFactory;
    use SoftDeletes;

    const TABLE = 'brands';

    protected $table = self::TABLE;
    protected $guarded = ['id'];

    protected $fillable = [
        'name',
    ];

    /**
     * Отношение к моделям
     * @return HasMany
     */
    public function models(): HasMany
    {
        return $this->hasMany(Model::class);
    }
}
