<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'image',
        'imageA',
        'imageB',
        'phone',
        'governorates_id',
        'city',
        'category_id',
        'NationalNumber',

    
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function governorate()
    {
        return $this->belongsTo(Governorate::class, 'governorates_id');
    }

    public function dates()
    {
        return $this->hasMany(Date::class, 'employees_id');
    }
    


}
