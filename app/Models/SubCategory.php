<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class SubCategory extends Model
{
    use HasFactory;

    public function Category(): HasOne
    {
        return $this->hasOne(Category::class);
    }
}
