<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tickets extends Model
{
    use HasFactory;

    protected $table = 'tickets';

    protected $fillable = [
        'title',
        'description',
        'reporting_user_name',
        'user_id',
        'department_id',
        'ticket_type_id',
        'ticket_status_id',
    ];

    protected $casts = [];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function department()
    {
        return $this->belongsTo(Departments::class, 'department_id');
    }

    public function ticket_type()
    {
        return $this->belongsTo(TicketType::class, 'ticket_type_id');
    }

    public function ticket_status()
    {
        return $this->belongsTo(TicketStatuses::class, 'ticket_status_id');
    }
}
