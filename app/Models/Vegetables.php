<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vegetables extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'stock', 'price', 'description', 'photo', 'category_id', 'supplier_id']; // Tambahkan 'category_id' dan 'supplier_id'

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Relasi ke tabel Suppliers
    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }
}
