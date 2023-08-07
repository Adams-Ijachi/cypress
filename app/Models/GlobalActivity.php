<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GlobalActivity extends Model
{
    use  HasFactory;

    protected $fillable = [
        'title',
        'description',
        'image',
        'date',
    ];

    protected $casts = [
        'date' => 'date',
    ];

    public function getDateAttribute($value): string
    {
        return date('Y-m-d', strtotime($value));
    }


}
