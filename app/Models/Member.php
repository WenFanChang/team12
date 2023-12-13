<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'oid',
        'position' ,
        'height',
        'weight',
        'year',
        'age',
        'nationality'
    ];
    public function Orchestra()
    {
        return $this->belongsTo('App\Models\Orchestra', 'oid', 'id');
    }
}
