<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Date extends Model
{
    use HasFactory;

    protected $table = 'dates';

protected $fillable=['employees_id','startDate','endDate'];


public function employee(){
    return $this->belongsTo(Employee::class);
}
}
