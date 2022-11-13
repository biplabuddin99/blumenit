<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Homesection4view extends Model
{
    use HasFactory;
    public function homesection4image(){
        return $this->hasMany(Homesection4image::class);
    }
}
