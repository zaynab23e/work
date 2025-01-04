<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Governorate extends Model
{
    use HasFactory;
    protected $fillable = ['name'];

    public function craftsmen(){
        return $this->belongsTo(Employee::class);
    }


    
}
