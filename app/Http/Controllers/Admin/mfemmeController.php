<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\client;
use App\Models\mfemme;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class mfemmeController extends Controller
{
    public function mfemme(){
        
        $mfemme = DB::table('clients')
        ->join('mfemmes', 'clients.id','=','mfemmes.client_id' )
        ->get();

        return view("admin.mfemme", compact("mfemme"));
    }




    public function creer(){

        $listemfemme = client::all();

        return view("admin/form/creermfemmes", compact("listemfemme"));
    }



    public function edit(mfemme $mfemme){

        $mfemme = mfemme::all();

        return view("admin/formModif/modifmfemmes", compact("mfemme"));
    }

    public function store(Request $request){
        $request->validate([ 
            "epaule"=>"Required", 
            "long_manche"=>"Required", 
            "t_manche"=>"Required", 
            "poitrine"=>"Required",
            "dos"=>"Required", 
            "frappe"=>"Required", 
            "ceinture"=>"Required", 
            "long_pentalon"=>"Required", 
            "cuisse"=>"Required", 
            "bassin"=>"Required", 
            "long_genou"=>"Required", 
            "bas"=>"Required",
            "t_taille"=>"Required", 
            "long_totale"=>"Required", 
            "long_taille"=>"Required", 
            "long_robe"=>"Required", 
            "long_jupe"=>"Required", 
            "epaule_manche"=>"Required",
            "client_id"=>"Required"
        ]);
        mfemme::create($request->all());
        return redirect()->route('admin.mfemme');

        return back()->with("success", "Mesure Ajouté avec succès!");
    }

    public function update(Request $request, mfemme $mfemme){
        $request->validate([
             
            "epaule"=>"Required", 
            "long_manche"=>"Required", 
            "t_manche"=>"Required", 
            "poitrine"=>"Required",
            "dos"=>"Required", 
            "frappe"=>"Required", 
            "ceinture"=>"Required", 
            "long_pentalon"=>"Required", 
            "cuisse"=>"Required", 
            "bassin"=>"Required", 
            "long_genou"=>"Required", 
            "bas"=>"Required",
            "t_taille"=>"Required", 
            "long_totale"=>"Required", 
            "long_taille"=>"Required", 
            "long_robe"=>"Required", 
            "long_jupe"=>"Required", 
            "epaule_manche"=>"Required",
            "client_id"=>"Required"
        ]);
        $mfemme->update($request->all());
        return redirect()->route('admin.mfemme');

        return back()->with("success", "Mésure Ajouté avec succès!");
    }

    public function delete(mfemme $mfemme){
        $epaule = $mfemme->epaule;
        $mfemme->delete();

        return back()->with("successDelete", "la mesure de $epaule supprimer avec succès!");
    }
}
