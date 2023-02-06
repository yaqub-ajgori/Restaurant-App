<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Table extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'guests_number',
        'status',
        'location',
    ];

    protected $casts = [
        'status' => 'App\Enums\TableStatus',
        'location' => 'App\Enums\TablesLocation',
    ];

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }
}
