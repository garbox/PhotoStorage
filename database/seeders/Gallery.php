<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Gallery extends Seeder
{

    public function run(): void
    {
        DB::table('galleries')->insert([
            'gallery_name' => "Vacation 2025",
            'gallery_description' => "All small trips",
            'user_id' => 1,
        ]);

        DB::table('galleries')->insert([
            'gallery_name' => "Snow Trip 2024",
            'gallery_description' => "Snow Trip",
            'user_id' => 1,
        ]);
    }
}
