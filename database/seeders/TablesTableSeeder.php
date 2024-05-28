<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class TablesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now();

        DB::table('tables')->insert([
            ['id' => 1, 'table_number' => '1', 'capacity' => 2, 'status' => 'available', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 2, 'table_number' => '2', 'capacity' => 4, 'status' => 'available', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 3, 'table_number' => '3', 'capacity' => 4, 'status' => 'available', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 4, 'table_number' => '4', 'capacity' => 2, 'status' => 'available', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 5, 'table_number' => '5', 'capacity' => 4, 'status' => 'available', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 6, 'table_number' => '6', 'capacity' => 4, 'status' => 'available', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 7, 'table_number' => '7', 'capacity' => 4, 'status' => 'available', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 8, 'table_number' => '8', 'capacity' => 4, 'status' => 'available', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 9, 'table_number' => '9', 'capacity' => 4, 'status' => 'available', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 10, 'table_number' => '10', 'capacity' => 6, 'status' => 'available', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 11, 'table_number' => '11', 'capacity' => 4, 'status' => 'available', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 12, 'table_number' => '12', 'capacity' => 4, 'status' => 'available', 'created_at' => $now, 'updated_at' => $now],
        ]);
    }
}
