<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserActivity extends Model
{
    use SoftDeletes, HasFactory;

    protected $fillable = [
        'user_id',
        'global_activity_id',
        'title',
        'description',
        'image',
        'is_global',
        'date',
    ];

    protected $casts = [
        'is_global' => 'boolean',
        'date' => 'date',
    ];

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function globalActivity(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(GlobalActivity::class);
    }

    // if is global, then get global activity title and description
    // else get user activity title and description
    public function getTitleAttribute(): string
    {

        if ($this->is_global && $this->globalActivity) {
            return $this->globalActivity->title;
        }
        return $this->attributes['title'] ?? '';
    }

    public function getDescriptionAttribute(): string
    {
        if ($this->is_global && $this->globalActivity) {
            return $this->globalActivity->description;
        }
        return $this->attributes['description'] ?? '';
    }

    public function getImageAttribute(): string
    {
        if ($this->is_global && $this->globalActivity) {
            return $this->globalActivity->image;
        }
        return $this->attributes['image'] ?? '';
    }

    public function getDateAttribute(): string
    {


        if ($this->is_global) {
            return Carbon::parse($this->globalActivity->date)->format('Y-m-d');
        }

        $date = $this->attributes['date'];

        return Carbon::parse($date)->format('Y-m-d');

    }




}
