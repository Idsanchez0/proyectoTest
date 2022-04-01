<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TicketsAereo extends Model
{
    use HasFactory;

    protected $table = 'tickets_aereos';

    protected $fillable = [

        'destination',
        'airline',
        'price',
        'stopover_number',
        'departure',
        'arrival',
        'duration'
    ];


}
