<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    use HasFactory;

    protected $table = 'vendors';

    protected $fillable = [
        'latitude', 'longitude', 'name', 'mobile', 'password', 'address', 'email', 'logo', 'category_id', 'active', 'created_at', 'updated_at'
    ];

    public function getLogoAttribute($val)
    {
        return ($val !== null) ? asset('assets/' . $val) : "";

    }

    public function scopeSelection($query)
    {
        return $query->select('id', 'category_id','latitude','longitude', 'active', 'name', 'address', 'email', 'logo', 'mobile');
    }

}

