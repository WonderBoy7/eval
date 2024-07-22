<?php

namespace App\Http\Controllers;

use App\Http\Requests\DevisRequest;
use App\Models\Devis;
use App\Models\TypeFinition;
use App\Models\TypeMaison;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class DevisClientController extends Controller
{
    // //
    // public function creationDevis(){
    //     return view('client.creation_devis');
    // }
    public function showPaiement(){
        return view('client.paiement');
    }
    public function showListesDevis(){
        return view('client.liste_devis');
    }

    public function addDevis(){
        $typesMaison = TypeMaison::all();
        $finition = TypeFinition::all();
        return view('client.creation_devis',[
            'client' => session('client'),
            'typemaison' => $typesMaison,
            'finitions' => $finition
        ]);

    }
    public function storeDevis(DevisRequest $request){
        $data = $request->validated();
        $client = session('client');
        $date_debut = $data['date_debut'];
        // dd($date_debut);
        try {
            //code...
           $devis= Devis::create([
                'ref_devis' => Devis::getNextRefNumber(),
                'idclient' => $client->id,
                'idtypemaison' => $data['type_maison'],
                'idtypefinition' => $data['finition'],
                'date_debut' => $date_debut,
                'date_devis' => Carbon::now()->format('d/m/y')
            ]);
            $date = Carbon::parse($date_debut);
            $date = $date->addDays($devis->type_maison->dure);
            $devis->date_fin = $date;
            $devis->prix_unitaire = $devis->getTotalMontant() +($devis->getTotalMontant() * $devis->type_finition->pourcentage/100);
            $devis->save();
            $devis->saveDetails();

            return to_route('client.index');
        } catch (\Throwable $th) {
            // dd($th);
            // return to_route('devis.create');
            throw $th;
        }
    }
}
