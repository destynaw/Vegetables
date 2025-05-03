<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function vegetables()
    {
        return $this->hasMany(Vegetables::class);
    }
}
