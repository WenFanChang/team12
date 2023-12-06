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

    public function members()

    {
        return $this->hasMany('App\Models\Member','oid');
    }
    public function delete()
    {
        $this->members()->delete();
        return parent::delete();



    }



}
