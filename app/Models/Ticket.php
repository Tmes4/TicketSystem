<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{

    use HasFactory;

    protected $fillable = [
        'price',
        'reservations_id',
        'created_at',
        'updated_at',
    ];

    public function reservation()
    {
        return $this->belongsTo(Reservation::class, 'reservations_id');
    }
}
