<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TempCSV extends Model
{
    use HasFactory;
    protected $fillable = [];

    public static function insertCollectionData($donnees){

        // Préparer les données à insérer dans le bon format
        $donneesAInserer = $donnees->map(function ($element) {
            return [
                'salle' => $element['salle'],
                'film' => $element['film'],
                'horaire' => $element['horaire'],
                'duree' => $element['duree'],
            ];
        })->toArray();

        // Insérer les données dans la base de données
        TempCSV::insert($donneesAInserer);
        // dd($donneesAInserer);
    }
    public static function insertDataFromTable(){
         // Insérer les données distinctes de la table temps dans les tables film et salle
        //  DB::beginTransaction();
        //  try{
        //      Film::insert(
        //          DB::table('temps')->select('film')->distinct()->get()->map(function ($item) {
        //              return ['titre' => $item->film];
        //          })->toArray()
        //      );

             // $test = DB::table('temps')->select('film')->distinct()->get()->map(function ($item) {
             //     return ['titre' => $item->film];
             // })->toArray();
             // dd($test);

            //  Salle::insert(
            //      DB::table('temps')->select('salle')->distinct()->get()->map(function ($item) {
            //          return ['designation' => $item->salle];
            //      })->toArray()
            //  );

             // Récupérer les id_film et id_salle correspondant aux noms de film et de salle dans temps

            //  $seances = DB::table('temps')
            //  ->join('films', 'films.titre', '=', 'temps.film')
            //  ->join('salles', 'salles.designation', '=', 'temps.salle')
            //  ->select('films.id as id_film', 'salles.id as id_salle', 'temps.horaire', 'temps.duree')
            //  ->get()
            //  ->map(function ($item) {
            //      return [
            //          'idfilm' => $item->id_film,
            //          'idsalle' => $item->id_salle,
            //          'heure_diffusion' => $item->duree
            //      ];
            //  });


             // Insérer les données dans la table seance
            //  Seance::insert($seances->toArray());
            //  DB::delete('delete from temps');
            //  DB::commit();
             // dd($seances);

        //  } catch(Exception $e){
        //      DB::rollBack();
        //      throw $e;
        //  }


    }
}
