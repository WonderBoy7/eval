<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeMaison extends Model
{
    use HasFactory;
    protected $fillable=['name','description','dure'];

    public function getTotalMontant(){
        $details = $this->details;
        $total=0;
        foreach($details as $key => $detail ){
            $total += $detail->travails->prix_unitaire*$detail->qte;
        }
        return $total;
    }
    public function details(){
        return $this->hasMany(DetailTravail::class,'id_type_maison');
    }
}
