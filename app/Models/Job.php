<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'image', 'description','salary', 'company_id', 'category_id', 'type_id'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function location()
    {
        return $this->hasOne(location::class);
    }

    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

}
