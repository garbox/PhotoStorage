<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Products extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert([
            'name' => "Free",
            'storage_space_mb' => 5000,
            'price' => 1,
        ]);

        DB::table('products')->insert([
            'name' => "Starter",
            'storage_space_mb' => 500000,
            'price' => 13.99,
        ]);

        DB::table('products')->insert([
            'name' => "Professional",
            'storage_space_mb' => 1000000,
            'price' => 24.99,
        ]);

        DB::table('products')->insert([
            'name' => "Enterprise",
            'storage_space_mb' => 5000000,
            'price' => 120,
        ]);
    }
}