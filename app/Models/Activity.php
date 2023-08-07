<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Builder;

class Activity extends Model
{
    use SoftDeletes, HasFactory;

    protected $fillable = [
        'title',
        'description',
        'image',
        'date',
        'is_global',
        'user_id',
    ];

    protected $casts = [
        'date' => 'datetime',
        'is_global' => 'boolean'
    ];

    // get date in format 2021-01-01
    public function getDateAttribute($value): string
    {
        return date('Y-m-d', strtotime($value));
    }


    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function scopeGlobal(Builder $query): void
    {
        $query->where('is_global', true);
    }
}
