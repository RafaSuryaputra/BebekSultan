<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Table extends Model
{
    use HasFactory;

    // id	table_number	capacity	status
    protected $guarded = [];

    // nicolaslopezj/searchable
    protected $searchable = [
        'columns' => [
            'tables.table_number' => 10,
            'tables.capacity' => 10,
            'tables.status' => 10,
        ]
    ];

    public function reservations(){
        return $this->hasMany(Reservation::class);
    }

    
}
