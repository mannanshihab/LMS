<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curriculam extends Model
{
    use HasFactory;

    public function homeworks(){
        return $this->hasMany(Homework::class); 
    }

    public function attendance(){
        return $this->hasMany(Attendance::class); 
    }
}
