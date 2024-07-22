<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Devis extends Model
{
    use HasFactory;
    protected $fillable =['idclient','idtypemaison','idtypefinition','date_debut','date_fin','date_devis','prix_unitaire','pourcentage','ref_devis','lieu'];

    public function AleaCss(){

        if($this->getPayPourcent()>50){
            return "green";
        }
        else if($this->getPayPourcent()<50){
            return "red";
        }
        return " ";
    }

    public function saveDetails(){
        $details = $this->type_maison->details;
        // dd($details);
        foreach($details as $key =>$detail){
            DetailDevis::create([
                'iddevis' => $this->id,
                'idtravail' => $detail->id_travails,
                'idunite' =>$detail->travails->idunite,
                'qte' =>$detail->qte,
                'pu' =>$detail->travails->prix_unitaire

            ]);
        }
    }
    public static function sumAll($devis){
        $sum = 0;
        foreach($devis as $devi) {
            $sum += $devi->prix_unitaire;
        }
        return number_format($sum,2,',',' ');
    }
    public function getEtatPaiement(){
        if($this->getTotalPayer()==$this->getTotalMontant()){
            return 'check';
        }
        return 'close';
    }
    public function getPayPourcent(){
        $total = $this->prix_unitaire; /* 100% */
        $payer = $this->getTotalPayer();
        return number_format(($payer/$total)*100,2);
    }
    public function getTotalPayer(){
        $paiements = $this->paiements;
        $total = 0;
        foreach($paiements as $key => $paiement){
            $total += $paiement->montant;
        }
        return $total;
    }
    public static function getNextRefNumber(){
        $nextval = DB::select("SELECT nextval('seq_devis')")[0]->nextval;
        return 'D' . str_pad($nextval, 3, '0', STR_PAD_LEFT);
    }
    public function getTotalPayeFormated(){
        return number_format($this->getTotalPayer(),2,',',' ');
    }
    public function getTotalMontant(){
        return $this->type_maison->getTotalMontant();
    }
    public function getTotalFormated(){
        return number_format( $this->type_maison->getTotalMontant(),2,',',' ');
    }
    public function getDenormalizeTotal(){
        return number_format($this->prix_unitaire,2,',',' ');
    }
    public function paiements(){
        return $this->hasMany(Paiement::class,'id_devis');
    }
    public function client(){
        return $this->belongsTo(Client::class,'idclient');
    }
    public function type_maison(){
        return $this->belongsTo(TypeMaison::class,'idtypemaison');
    }
    public function type_finition(){
        return $this->belongsTo(TypeFinition::class,'idtypefinition');
    }
    public function details(){
        return $this->hasMany(DetailDevis::class,'iddevis');
    }
}
