<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TicketStatuses extends Model
{
    use HasFactory;

    protected $table = "ticket_statuses";
    protected $fillable = [
        "name"
    ];

    protected $casts = [];
}