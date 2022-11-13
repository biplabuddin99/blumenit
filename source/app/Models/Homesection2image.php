<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Homesection2image extends Model
{
    use HasFactory;
    public function homesection2view(){
        return $this->belongsTo(Homesection2view::class);
    }
}
