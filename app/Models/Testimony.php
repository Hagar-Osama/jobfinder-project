<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimony extends Model
{
    use HasFactory;
    protected $fillable = ['image', 'description', 'user_id'];

    public function user() {
        
        return $this->belongsTo(User::class);
    }
}
