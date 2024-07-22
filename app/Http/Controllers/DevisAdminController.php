<?php

namespace App\Http\Controllers;

use App\Models\Devis;
use Illuminate\Http\Request;

class DevisAdminController extends Controller
{
    //
    public function listeDevis(){
        $allDevis=Devis::paginate(4);
        return view('admin.liste_devis',['devis'=>$allDevis]);
    }
    public function detailsDevis(Devis $devis){

        return view('admin.details_devis',['devis'=>$devis]);
    }
    public function getAllDevis(){
        $all=Devis::all();
        $total=Devis::sumAll($all);
        return view('admin.dashboard',[
            'devis' => $all,
            'total' => $total
        ]);
    }
}
