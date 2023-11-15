<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orchestra extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'company',
        'city',
        'style',
        'created_at'
    ];


}
