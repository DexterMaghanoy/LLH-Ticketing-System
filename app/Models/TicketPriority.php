<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TicketPriority extends Model
{
    /** @use HasFactory<\Database\Factories\TicketPriorityFactory> */
    use HasFactory;
protected $fillable = [
        'name',
        'slug',
        'color',
        'acknowledgement_target_minutes',
        'resolution_target_minutes',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public $timestamps = true;

    protected $table = 'ticket_priorities';
}
