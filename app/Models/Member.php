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

public function orchestra()
{

    return $this->belongsTo('App\models\Orchestra','oid','id');
}


}









