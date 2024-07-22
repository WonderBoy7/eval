<?php

namespace App\Models;

use Exception;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class TempPaiement extends Model
{
    use HasFactory;
    protected $fillable = ['ref_devis','ref_paiement','date_paiement','montant'];

    public static function insertCollectionData($donnees)
    {
        // Préparer les données à insérer dans le bon format
        $donneesAInserer = $donnees->map(function ($element) {
            static $line = 0;
            $line++;
            return [
                'line' => $line,
                'ref_devis' => $element['ref_devis'],
                'ref_paiement' => $element['ref_paiement'],
                'date_paiement' => $element['date_paiement'],
                'montant' =>  floatval(str_replace('-', '', $element['montant']))
            ];
        })->toArray();
        // Insérer les données dans la base de données
        TempPaiement::insert($donneesAInserer);
        // dd($donneesAInserer);
    }

    public static function checkDataCoherence($data) {
        $error = array();
        // Check if duree is more than 03h
        // $dureeSuperieure = Temp::where('horaire', '>', '03:00:00')->get();
        // dd(Temp::all());
        // if (sizeof($dureeSuperieure) > 0) {
        //     // dd($dureeSuperieure);
        //     $message = "La duree des films ne devrait pas depasser les 03h. Lignes : ";
        //     foreach ($dureeSuperieure as $item) {
        //         $message.= $item->line.",";
        //     }
        //     $error['duree'] = $message;
        // }
        /* Autre check, ajouter dans la variable si erreur */

        return $error;
    }


    public static function insertDataFromTable(bool $commitable) {
        if ($commitable) {
            DB::beginTransaction();
        }
        try{
            Paiement::insert(
                DB::table('temp_paiements')
                ->select('temp_paiements.ref_paiement','temp_paiements.date_paiement', 'temp_paiements.montant','devis.id as iddevis')
                ->join('devis', 'devis.ref_devis', '=', 'temp_paiements.ref_devis')
                ->whereNotIn('temp_paiements.ref_paiement', function($request){ $request->select('ref_paiement')->from('paiements');
                })
                ->get()->map(function ($item) {
                    return [
                        'ref_paiement' => $item->ref_paiement,
                        'id_devis' => $item->iddevis,
                        'montant' => $item->montant,
                        'date_paiement' => $item->date_paiement,
                    ];
                })->toArray()
            );
            if ($commitable) {
               DB::commit();
            }
            // dd($seances);

        } catch(Exception $e){
            if ($commitable) {
                DB::rollBack();
            }
            throw $e;
        }
    }

    public static function importDataToDB($data,$commitable) {
        DB::beginTransaction();
        try {
            TempPaiement::insertCollectionData($data);
            $errors = TempPaiement::checkDataCoherence($data);
            if (sizeof($errors) > 0) {
                if($commitable){

                    DB::rollBack();
                }
            } else {
                TempPaiement::insertDataFromTable(false);
                if($commitable){

                    DB::commit();
                }
            }
            return $errors;
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }

    }

}
