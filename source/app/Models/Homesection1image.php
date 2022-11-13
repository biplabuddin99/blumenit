<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Homesection1image extends Model
{
    use HasFactory;
    public function homesection1view(){
        return $this->belongsTo(Homesection1view::class,'id','homesection1view_id');
    }
}
