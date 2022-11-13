<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Homesection3image extends Model
{
    use HasFactory;
    public function homesection3view(){
        return $this->belongsTo(Homesection3view::class);
    }
}
