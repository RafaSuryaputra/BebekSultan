<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Table>
 */
class TableFactory extends Factory
{
    protected $model = \App\Models\Table::class;
    private static $incrementingId = 0;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        self::$incrementingId++;

        $capacity = match (self::$incrementingId) {
            1, 4 => 2,
            10 => 6,
            default => 4,
        };            

        return [
            'id' => self::$incrementingId,
            'table_number' => self::$incrementingId,
            'capacity' => $capacity,
            'status' => 'available',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ];
    }
}
