<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TicketType extends Model
{
    use HasFactory;

    protected $table = 'ticket_types';

    protected $fillable = [
        'name',
        'description',
    ];

    protected $casts = [
    ];
}
