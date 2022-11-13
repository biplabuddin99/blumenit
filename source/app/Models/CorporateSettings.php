<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CorporateSettings extends Model
{
    use HasFactory;
    
    public function category(){
        return $this->belongsTo(Category::class);
    }
    
    public function logos(){
        return $this->hasMany(CorporateLogo::class);
    }
}
