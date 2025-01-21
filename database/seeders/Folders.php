<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Folders extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('folders')->insert([
            'folder_name' => "Vacation 2025",
            'folder_description' => "All small trips",
            'user_id' => 1,
        ]);

        DB::table('folders')->insert([
            'folder_name' => "Snow Trip 2024",
            'folder_description' => "Snow Trip",
            'user_id' => 1,
        ]);
    }
}
