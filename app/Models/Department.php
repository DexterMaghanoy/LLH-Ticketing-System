<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'head_user_id',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function head()
    {
        return $this->belongsTo(User::class, 'head_user_id');
    }

    public function members()
    {
        return $this->hasMany(User::class, 'department_id');
    }

    public function ticketsReceived()
    {
        return $this->hasMany(Ticket::class, 'receiving_department_id');
    }

    public function ticketsRequested()
    {
        return $this->hasMany(Ticket::class, 'requesting_department_id');
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
}
