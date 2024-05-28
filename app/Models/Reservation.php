<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    // nicolaslopezj/searchable
    // id	user_id	table_id	payment_method	payment_proof	note	status
    protected $searchable = [
        'columns' => [
            'reservations.note' => 10,
            'reservations.status' => 10,
            'reservations.payment_method' => 10,
            'reservations.note' => 10,
            'reservations.status' => 10,
        ]
    ];

    protected $guarded = [""];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function table(){
        return $this->belongsTo(Table::class);
    }

    
}
