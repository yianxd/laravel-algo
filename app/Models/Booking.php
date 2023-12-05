<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    //use HasFactory;
    protected $table="bookings";
    protected $primaryKey="id_booking";
    protected $fillable=[
        'dni',
        'id_room',
        'date'
    ];
}
