<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Travail extends Model
{
    use HasFactory;
    protected $fillable = ['designation','code','prix_unitaire','idunite'];

    public function unite(){
        return $this->belongsTo(Unite::class,'idunite');
    }
}
