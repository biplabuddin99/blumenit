<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Homesection1view extends Model
{
    use HasFactory;
    public function homesection1image(){
        return $this->hasMany(Homesection1image::class,'homesection1view_id','id');
    }
}
