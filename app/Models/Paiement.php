<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Paiement extends Model
{
    use HasFactory;
    protected $fillable = ['id_devis','montant','date_paiement','ref_paiement'];
    public static function getNextRefNumber(){
        $nextval= DB::select("SELECT nextval('seq_paiements')")[0]->nextval;
        return 'P' . str_pad($nextval,4,'0',STR_PAD_LEFT);
    }
}
