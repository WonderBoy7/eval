<?php

namespace App\Http\Controllers;

use App\Models\HelperCSV;
use App\Models\MaisonTravail;
use App\Models\TempCSV;
use App\Models\TempDevis;
use App\Models\TempPaiement;
use Faker\Extension\Helper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CSVControlleur extends Controller
{
    //
    public function csvImport(Request $request){
        $request->validate( [
            'data'=> 'required|file|mimes:csv|max:2048'
        ]);
        //^data = $request->validate('data');
        $fichier = $request->file('data');

        //déplacer le fichier télécharger vers un emplacement temporaire
        $fichier->move(storage_path('app'),'fichier_temp.csv');

        //chemin vers le fichier temp
        $filePath = storage_path('app/fichier_temp.csv');
        $data_exploded = HelperCSV::CSVtoCollection($filePath);
        TempCSV::insertCollectionData($data_exploded);
        TempCSV::insertDataFromTable();
        return to_route('forme');
    }
    public function list(){

    }
    public function maisonDevisImport() {
        return view('admin.import.maisondevis');
    }

    public function importTypeMaisonDevis(Request $request) {
        $request->validate([
            'maison_travaux' => 'required|file|max:2048',
            'devis' => 'required|file|max:2048'
        ]);
        // $data = $request->validate('data');
        $file_maison_travaux = $request->file('maison_travaux');
        $devisFile = $request->file('devis');

        // Déplacer le fichier téléchargé vers un emplacement temporaire
        $file_maison_travaux->move(storage_path('app'), 'temp_maison_travaux.csv');
        $devisFile->move(storage_path('app'), 'temp_devis.csv');

        // Chemin vers le fichier temporaire
        $pathFile = storage_path('app/temp_maison_travaux.csv');
        $pathDevis = storage_path('app/temp_devis.csv');
        $data_exploded_maisontravaux = HelperCSV::CSVtoCollection($pathFile);
        $data_exploded_devis = HelperCSV::CSVtoCollection($pathDevis);
        // dd($data_exploded);
        // Temp::checkDataCoherence($data_exploded);
        // $errors = Temp::importDataToDB($data_exploded);
        // if (sizeof($errors) > 0) {
        //     return to_route('forms')->withErrors($errors);
        // }
        // MaisonTravail::insertCollectionData($data_exploded_maisontravaux);
        // MaisonTravail::insertDataFromTable(true);
        DB::beginTransaction();
        $errors =array();
        $temp_error = MaisonTravail::importDataToDB($data_exploded_maisontravaux,true);
        if(sizeof($temp_error) > 0) {
            array_push($errors,$temp_error);
            $temp_error= null;
            $temp_error=array();
        }
        $temp_error = TempDevis::importDataToDB($data_exploded_devis,true);
        if(sizeof($temp_error) > 0) {
            array_push($errors,$temp_error);
        }
        if(sizeof($errors) > 0) {
            DB::rollBack();
            return to_route('import.form.maison.devis')->withErrors($errors);
        }

        DB::commit();

        // TempDevis::insertCollectionData($data_exploded_devis);
        // TempDevis::insertDataFromTable(true);
        // dd($data_exploded_devis);
        // Temp::insertDataFromTable();
        return to_route('import.form.maison.devis');
    }

    public function paiementImport() {
        return view('admin.import.paiement');
    }

    public function importPaiement(Request $request) {
        $request->validate([
            'paiements' => 'required|file|max:2048'
        ]);
        // $data = $request->validate('data');
        $file_maison_travaux = $request->file('paiements');

        // Déplacer le fichier téléchargé vers un emplacement temporaire
        $file_maison_travaux->move(storage_path('app'), 'temp_paiement.csv');

        // Chemin vers le fichier temporaire
        $pathFile = storage_path('app/temp_paiement.csv');
        $data_exploded_paiement = HelperCSV::CSVtoCollection($pathFile);
        // dd($data_exploded_paiement);
        // Temp::checkDataCoherence($data_exploded);
        // $errors = Temp::importDataToDB($data_exploded);
        // if (sizeof($errors) > 0) {
        //     return to_route('forms')->withErrors($errors);
        // }
        DB::beginTransaction();
        $errors = TempPaiement::importDataToDB($data_exploded_paiement,true);
        if (sizeof($errors) > 0) {
            DB::rollBack();
            return to_route('import.form.paiement');
        }
        else{
            DB::commit();
        }
        // TempPaiement::insertCollectionData($data_exploded_paiement);
        // TempPaiement::insertDataFromTable(true);
            // dd($data_exploded_paiement);
        // Temp::insertDataFromTable();
        return to_route('import.form.maison.devis');
    }
}
