<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Homesection2view extends Model
{
    use HasFactory;
    public function homesection2image(){
        return $this->hasMany(Homesection2image::class);
    }
}
