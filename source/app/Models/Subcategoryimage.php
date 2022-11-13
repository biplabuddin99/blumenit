<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcategoryimage extends Model
{
    use HasFactory;

    public function subcategory(){
        return $this->belongsTo(Subcategory::class);
    }
}
