<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $guarded = [];

    // nicolaslopezj/searchable
    // 	id	name	stock	price	image	description
    protected $searchable = [
        'columns' => [
            'menus.name' => 10,
            'menus.description' => 10,
            'menus.price' => 10,            
        ]
    ];

    
}
