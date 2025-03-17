<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Storage extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('storage_allowances')->insert([
            'user_id' => 1,
            'storage_used' => 0,
            'storage_allowed' => 15000,
        ]);
    }
}
