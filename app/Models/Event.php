<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Carbon;

class Event extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }

    public function getTimeAttribute($value)
    {
        return substr($value, 0, 5);
    }

public function getDateAttribute($value) 
{
    return date('d-m-Y', strtotime($value));    
}

}
