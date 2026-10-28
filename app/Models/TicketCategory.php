<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TicketCategory extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'description',
        'suggested_receiving_department_id',
        'is_active',
        'sort_order',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public $timestamps = true;

    protected $table = 'ticket_categories';

    public function suggestedReceivingDepartment()
    {
        return $this->belongsTo(Department::class, 'suggested_receiving_department_id');
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
}
