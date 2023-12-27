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
        return $this->belongsTo('App\Models\Orchestra', 'oid', 'id');
    }

    public function scopeSenior($query)
    {
        return $query->where('year', '>', 15)->orderBy('year', 'asc');        
    }

    public function scopeAllPositions($query)
    { 
        return $query->select('position')->groupBy('position');
    }

    public function scopePosition($query, $pos)
    {
        return $query->where('position', '=', $pos);
    }    
}
