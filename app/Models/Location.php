<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;
    protected $fillable = ['country', 'state', 'city', 'company_id', 'job_id'];


    public function job()
    {
        return $this->belongsTo(Job::class);
    }
    // public function company()
    // {
    //     return $this->belongsTo(Company::class, 'id', 'company_id');
    // }


}
