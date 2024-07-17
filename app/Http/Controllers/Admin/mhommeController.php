<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\client;
use App\Models\mhomme;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class mhommeController extends Controller
{
    public function mhomme(){



        $mhomme = DB::table('clients')
        ->join('mhommes', 'clients.id','=','mhommes.client_id' )
        ->get();

        return view("admin.mhomme", compact("mhomme"));
        
    }

    public function creer(){
       $listeClient = client::all();
         

        return view("admin/form/creermhommes", compact("listeClient"));
        
    }

    public function edit(mhomme $mhomme){

        $mhomme = mhomme::all();

        return view("admin/formModif/modifmhommes", compact("mhomme"));
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
            "epaule_manche"=>"Required",
            "client_id"=>"Required"
        ]);
        //dd($request->client_id);
        mhomme::create([
            "epaule"=>$request->epaule,
            "long_manche"=>$request->long_manche,
            "t_manche"=>$request->t_manche,
            "poitrine"=>$request->poitrine,
            "dos"=>$request->dos,
            "frappe"=>$request->frappe,
            "ceinture"=>$request->ceinture,
            "long_pentalon"=>$request->long_pentalon,
            "cuisse"=>$request->cuisse,
            "bassin"=>$request->bassin,
            "long_genou"=>$request->long_genou,
            "bas"=>$request->bas,
            "t_taille"=>$request->t_taille,
            "long_totale"=>$request->long_totale,
            "long_taille"=>$request->long_taille,
            "epaule_manche"=>$request->epaule_manche,
            "client_id"=>$request->client_id


        ]);
        return redirect()->route('admin.mhomme');

        return back()->with("success", "Mesure Ajouté avec succès!");
    }

    public function update(Request $request, mhomme $mhomme){
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
            "epaule_manche"=>"Required",
            "client_id"=>"Required"
        ]);
        $mhomme->update($request->all());
        return redirect()->route('admin.mhomme');

        return back()->with("success", "Mésure Ajouté avec succès!");
    }

    public function delete(mhomme $mhomme){
        $epaule = $mhomme->epaule;
        $mhomme->delete();

        return back()->with("successDelete", "la mesure de $epaule supprimer avec succès!");
    }
}
