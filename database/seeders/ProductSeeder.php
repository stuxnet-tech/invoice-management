<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::insert([
            ['name' => 'Laptop', 'unit' => 'piece', 'price' => 50000],
            ['name' => 'Mobile', 'unit' => 'piece', 'price' => 20000],
        ]);
    }
}
