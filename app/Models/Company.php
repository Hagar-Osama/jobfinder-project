<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'email', 'password', 'location', 'phone'];


    public function jobs()
    {
        return $this->hasMany(Job::class);
    }

    // public function location()
    // {
    //     return $this->hasOne(Location::class);
    // }

}
