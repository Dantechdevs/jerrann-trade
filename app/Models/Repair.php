<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Repair extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'device_type', 'brand', 'model', 'issue_description',
        'status', 'technician_notes', 'estimated_cost', 'actual_cost', 'phone',
    ];

    const STATUSES = [
        'submitted', 'diagnosed', 'quoted', 'approved', 'in_progress', 'completed', 'notified',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getStatusBadgeAttribute(): string
    {
        return match ($this->status) {
            'submitted'   => 'secondary',
            'diagnosed'   => 'info',
            'quoted'      => 'warning',
            'approved'    => 'primary',
            'in_progress' => 'primary',
            'completed'   => 'success',
            'notified'    => 'success',
            default       => 'light',
        };
    }

    public function getNextStatusAttribute(): ?string
    {
        $statuses = self::STATUSES;
        $current  = array_search($this->status, $statuses);
        return $statuses[$current + 1] ?? null;
    }
}
