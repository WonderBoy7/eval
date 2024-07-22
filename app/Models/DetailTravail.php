<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailTravail extends Model
{
    use HasFactory;
    protected $fillable = ['id_type_maison','id_travails','qte','prix_unitaire'];
    public function type_maison(){
        return $this->belongsTo(TypeMaison::class, 'id_type_maison');
    }
    public function travails(){
        return $this->belongsTo(Travail::class, 'id_travails');
    }
}
