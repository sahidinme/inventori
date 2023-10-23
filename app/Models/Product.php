<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['category_id', 'name', 'description', 'price'];

    // relasi ke kategorie
    public function Categories(): BelongsTo
    {
        return $this->belongsTo(Categories::class, 'category_id', 'id');
    }

}
