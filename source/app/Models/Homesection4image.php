<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Homesection4image extends Model
{
    use HasFactory;
    public function homesection4view(){
        return $this->belongsTo(Homesection4view::class);
    }
}
