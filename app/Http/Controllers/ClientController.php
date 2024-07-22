<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClientRequest;
use App\Models\Client;
use App\Models\Devis;
use App\Models\Paiement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ClientController extends Controller
{
    //
    public function index(){
        $client = session('client');
        $devis = Devis::where('idclient',$client->id)->paginate(5);
        return view('client.liste_devis', [
            'client' => session('client'),
            'devis' => $devis
        ]);
    }

    public function loginPage() {
        return view('auth.client');
    }
    public function logoutPage() {
        Auth::logout();
        return to_route('client.login');
    }
    public function doLogin(ClientRequest $request){
        $data=$request->validated();
        $client = Client::where('tel' , $data['tel'])->limit(1)->get()->first();
        if($client== null){
            $client = Client::create([
                'tel' => $data['tel']
            ]);
        }
        session()->put('client',$client);
        return to_route('client.index');
    }
    public function paiement(Devis $devis) {
        return view('client.paiement', [
            'client' => session('client'),
            'devis' => $devis
        ]);
    }
public function ws_pay(Request $request){
    $credentials = $request->validate([
        'date_paiement' => ['required','date'],
        'id_devis' => ['required'],
        'montant' => 'required'
    ]);
    $client = session('client');
    $devis = Devis::find($credentials['id_devis']);
    DB::beginTransaction();
    $pay  = Paiement::getNextRefNumber();
    // dd($pay);
    Paiement::create([
        'ref_paiement' => $pay,
        'id_devis' => $credentials['id_devis'],
        'montant' => $credentials['montant'],
        'date_paiement' => $credentials['date_paiement']
    ]);
    $somme = Paiement::where('id_devis', $credentials['id_devis'])->sum('montant');
    if($somme > $devis->prix_unitaire){
        DB::rollBack();
        return response()->json(['errors'=>'erreur le montant de paiement a depassé le montant à paye depasse']);
    }
    DB::commit();

    return response()->json(['success'=>'Paiement success']);
}

    public function payer(Request $request){
        $credentials = $request->validate([
            'date_paiement' => ['required','date'],
            'id_devis' => ['required'],
            'montant' => 'required'
        ]);
        $client = session('client');
        $devis = Devis::find($credentials['id_devis']);
        DB::beginTransaction();
        $pay  = Paiement::getNextRefNumber();
        // dd($pay);
        Paiement::create([
            'ref_paiement' => $pay,
            'id_devis' => $credentials['id_devis'],
            'montant' => $credentials['montant'],
            'date_paiement' => $credentials['date_paiement']
        ]);
        $somme = Paiement::where('id_devis', $credentials['id_devis'])->sum('montant');

        if($somme > $devis->prix_unitaire){
            DB::rollBack();
            return to_route('client.paiement',['devis'=>$devis->id])->withErrors(['error' => 'Le total de vos paiements ne doit pas depasse la somme demande']);
        }
        DB::commit();

        return to_route('client.index');
    }
}
