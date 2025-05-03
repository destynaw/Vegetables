<?php

// database/seeders/CategoriesTableSeeder.php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategoriesTableSeeder extends Seeder
{
    public function run()
    {
        // Menambahkan kategori sayuran
        Category::create(['name' => 'Sayuran Hijau']);
        Category::create(['name' => 'Sayuran Umbi']);
        Category::create(['name' => 'Sayuran Buah']);
        Category::create(['name' => 'Sayuran Berdaun']);
        Category::create(['name' => 'Sayuran Pedas']);
    }
}

