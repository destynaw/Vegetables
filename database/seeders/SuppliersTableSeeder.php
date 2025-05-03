<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Supplier;

class SuppliersTableSeeder extends Seeder
{
    public function run()
    {
        Supplier::create([
            'name' => 'CV Maju Jaya',
            'phone' => '081234567890',
            'address' => 'Jl. Kebun Raya No.1',
            'email' => 'majujaya@example.com',
        ]);

        Supplier::create([
            'name' => 'UD Sejahtera',
            'phone' => '089876543210',
            'address' => 'Jl. Anggrek No.10',
            'email' => 'sejahtera@example.com',
        ]);
    }
}
