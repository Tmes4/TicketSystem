<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'event_id',
        'created_at',
        'updated_at'
    ];

    public function event()
    {
        return $this->belongsTo(Event::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tickets()
    {
        return $this->hasMany(Ticket::class, 'reservations_id');
    }

    public function scopeUpcoming($query)
    {
        return $query->whereHas('event', function ($eventQuery) {
            $eventQuery->where('date', '>=', now())->orderBy('date', 'ASC');
        });
    }

    public function scopePast($query)
    {
        return $query->whereHas('event', function ($eventQuery) {
            $eventQuery->where('date', '<', now())->orderBy('date', 'ASC');
        });
    }
}
