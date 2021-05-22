<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'event_title',
        'start_date',
        'end_date',
        'recurrence1',
        'recurrence2',
    ];
    use HasFactory;
}
