<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    /** @use HasFactory<\Database\Factories\TicketFactory> */
    use HasFactory;
protected $fillable = [
        'ticket_number',
        'subject',
        'description',
        'requesting_department_id',
        'receiving_department_id',
        'requester_id',
        'assigned_to_id',
        'category_id',
        'priority_id',
        'location_id',
        'status',
        'occurrence_at',
        'preferred_completion_at',
        'asset_identifier',
        'resolution_summary',
        'acknowledged_at',
        'closed_at',
    ];

    protected $casts = [
        'occurrence_at' => 'datetime',
        'preferred_completion_at' => 'datetime',
        'acknowledged_at' => 'datetime',
        'closed_at' => 'datetime',
    ];

    public $timestamps = true;

    protected $table = 'tickets';

    protected $dates = [
        'occurrence_at',
        'preferred_completion_at',
        'acknowledged_at',
        'closed_at',
    ];
}
