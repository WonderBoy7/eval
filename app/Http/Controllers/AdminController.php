<?php

namespace App\Http\Controllers;

use App\Http\Requests\FinitionRequest;
use App\Http\Requests\TravauxRequest;
use App\Models\Devis;
use App\Models\Paiement;
use App\Models\Travail;
use App\Models\TypeFinition;
use App\Models\Unite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    //
    public function index(){
        return view("base.acceuil");
    }
    //

    public function importCSV(Request $request){
        $request->validate([
            'data' => 'required|file|mimes:csv|max:2048'
        ]);
        $data = $request->validated('data');
        dd($data);
    }
    public function show_importCsv(){
        return view('util.import');
    }//

    public function listeTravaux(){
        $travaux = Travail::orderBy('code')->paginate(5);

        return view('admin.liste_travaux',[
            'travaux' => $travaux,
            'unites' => Unite::all()
        ]);
    }

    public function modifTravaux(TravauxRequest $request){
        $travail = Travail::findOrFail($request->input('idtravail'));
        $credentials = $request->validated();
        $travail->code = $credentials['code'];
        $travail->designation = $credentials['designation'];
        $travail->prix_unitaire = $credentials['prix_unitaire'];
        $travail->idunite = $credentials['idunite'];
        $travail->save();
        return to_route('liste.travail');
    }
    public function listeFinition(){
        $finition = TypeFinition::orderBy('id')->paginate(5);
        return view('admin.liste_finition',['finition' => $finition]);
    }

    public function modifFinition(FinitionRequest $request){
        $finition = TypeFinition::findOrfail($request->input('idfinition'));
        $credentials = $request->validated();
        $finition->name = $credentials['name'];
        $finition->pourcentage = $credentials['pourcentage'];
        $finition->save();
        return to_route('liste.finition');
    }
    ///dashboard histogramme
    public function totalMontant(){
        $alldevis = Devis::all();
        $total = Devis::sumAll($alldevis);
        return $total;
    }
    public function totalPaiement(){
        $paiement = Paiement::sum('montant');
        return $paiement;
    }

    public function selectAnnee(){
        $annee = $this->getAnneeDevis();

        return $annee;
    }

    public function board(Request $request){

        $paiement = $this->totalPaiement();
        $montantTotal = $this->totalMontant();
        $annees = $this->getAnneeDevis();
        if($request->has('annee')){
            $aivr = $request->input('annee');
            $annee = intval($aivr);
        }
        else{
            if(sizeof($annees)>0){
            $aivr = ($this->getAnneeDevis()[0]);
            $annee = intval($aivr->annee);
        }
    }
    $moisArray = array();
    $montantMois = array();
     if(sizeof($annees)>0){

         $results = DB::select("
         SELECT
         TO_CHAR(date_devis, 'Month') AS mois,
         SUM(prix_unitaire) AS total,
         TO_CHAR(date_devis, 'YYYY') AS Annee
         FROM
         devis
         WHERE
         TO_CHAR(date_devis, 'YYYY') = ?
         GROUP BY
         TO_CHAR(date_devis, 'Month'), date_devis
         ORDER BY
         TO_CHAR(date_devis, 'MM');
         ",[$annee]);

         foreach ($results as $row) {
             $mois = $row->mois;
             $montant = $row->total;
             $montantMois[] = $montant;
             $moisArray[] = $mois;
            }
        }

        // dd($montantTotal);

        return view('admin.dashboard',['mois' => json_encode($moisArray), 'montantMois' => json_encode($montantMois),'montantTotal' => $montantTotal, 'totalPaiement' => $paiement, 'annee'=> $annees ]);
    }

    public function getAnneeDevis(){

        $resultsAnnee = DB::table('devis')
        ->select(DB::raw("to_char(date_devis, 'YYYY') AS annee"))
        ->groupBy(DB::raw("to_char(date_devis, 'YYYY')"))
        ->orderBy(DB::raw("to_char(date_devis, 'YYYY')"))
        ->get();

        return $resultsAnnee;

    }


    ///
    public function resetData(){
        // Réinitialiser les tables
        DB::statement('TRUNCATE TABLE temp_paiements RESTART IDENTITY CASCADE');
        DB::statement('TRUNCATE TABLE temp_devis RESTART IDENTITY CASCADE');
        DB::statement('TRUNCATE TABLE maison_travails RESTART IDENTITY CASCADE');
        DB::statement('TRUNCATE TABLE paiements RESTART IDENTITY CASCADE');
        DB::statement('TRUNCATE TABLE unites RESTART IDENTITY CASCADE');
        DB::statement('TRUNCATE TABLE devis RESTART IDENTITY CASCADE');
        DB::statement('TRUNCATE TABLE detail_travails RESTART IDENTITY CASCADE');
        DB::statement('TRUNCATE TABLE type_finitions RESTART IDENTITY CASCADE');
        DB::statement('TRUNCATE TABLE type_maisons RESTART IDENTITY CASCADE');
        DB::statement('TRUNCATE TABLE travails RESTART IDENTITY CASCADE');
        DB::statement('TRUNCATE TABLE clients RESTART IDENTITY CASCADE');

        DB::statement('ALTER SEQUENCE seq_devis START 1');
        DB::statement('ALTER SEQUENCE seq_paiements START 1');



        // Rediriger l'utilisateur vers une page de confirmation ou de reconnexion
        return redirect()->route('admin.dashboard')->with('success', 'La base de données a été réinitialisée.');
    }
}
