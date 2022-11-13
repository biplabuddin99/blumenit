<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Homesection3view extends Model
{
    use HasFactory;
    public function homesection3image(){
        return $this->hasMany(Homesection3image::class);
    }
}
