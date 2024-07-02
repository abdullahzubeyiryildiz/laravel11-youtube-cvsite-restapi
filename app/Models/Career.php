<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Career extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'company',
        'image',
        'start_date',
        'end_date',
        'description',
        'status',
    ];
}
