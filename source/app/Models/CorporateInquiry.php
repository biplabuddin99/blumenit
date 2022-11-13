<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CorporateInquiry extends Model
{
    use HasFactory;
    public function cset(){
        return $this->belongsTo(CorporateSettings::class,'title','id');
    }
}
