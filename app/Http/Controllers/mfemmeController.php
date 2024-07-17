<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\client;
use App\Models\mfemme;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class mfemmeController extends Controller
{
    public function mfemme(){

        $utilisateur = auth()->user();

        $mfemme  = mfemme::all()->where('user_id','=',$utilisateur->id);

        return view("mfemme", compact("mfemme"));
    }
    public function creer(){

        $utilisateur = auth()->user();

        return view("form/creermfemmes", compact("utilisateur"));
    }



    public function edit(mfemme $mfemme){

        $mfemme = mfemme::all();

        return view("formModif/modifmfemmes", compact("mfemme"));
    }

    public function Store(Request $request){
        $utilisateur = auth()->user();
        $request->validate([ 
            "nom"=>"Required", 
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
        ]);
        $mfemme = new mfemme();
        $mfemme->nom = $request->nom;
        $mfemme->epaule = $request->epaule;
        $mfemme->long_manche = $request->long_manche;
        $mfemme->t_manche = $request->t_manche;
        $mfemme->poitrine = $request->poitrine;
        $mfemme->dos = $request->dos;
        $mfemme->frappe = $request->frappe;
        $mfemme->ceinture = $request->ceinture;
        $mfemme->long_pentalon = $request->long_pentalon;
        $mfemme->cuisse = $request->cuisse;
        $mfemme->bassin = $request->bassin;
        $mfemme->long_genou = $request->long_genou;
        $mfemme->bas = $request->bas;
        $mfemme->t_taille = $request->t_taille;
        $mfemme->long_totale = $request->long_totale;
        $mfemme->long_taille = $request->long_taille;
        $mfemme->long_robe = $request->long_robe;
        $mfemme->long_jupe = $request->long_jupe;
        $mfemme->epaule_manche = $request->epaule_manche;
        $mfemme->user_id = $utilisateur->id;
    
        $mfemme->save();
        
        return redirect()->route('mfemme');

        return back()->with("success", "Mesure Ajouté avec succès!");
    }

    public function update(Request $request, String $id){
        $utilisateur = auth()->user();
       

        
        $request->validate([
             
            "nom"=>"Required", 
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
            "epaule_manche"=>"Required"

            

        ]);
        
        $mfemme = mfemme::find($request->id);
        $mfemme->nom = $request->nom;
        $mfemme->epaule = $request->epaule;
        $mfemme->long_manche = $request->long_manche;
        $mfemme->t_manche = $request->t_manche;
        $mfemme->poitrine = $request->poitrine;
        $mfemme->dos = $request->dos;
        $mfemme->frappe = $request->frappe;
        $mfemme->ceinture = $request->ceinture;
        $mfemme->long_pentalon = $request->long_pentalon;
        $mfemme->cuisse = $request->cuisse;
        $mfemme->bassin = $request->bassin;
        $mfemme->long_genou = $request->long_genou;
        $mfemme->bas = $request->bas;
        $mfemme->t_taille = $request->t_taille;
        $mfemme->long_totale = $request->long_totale;
        $mfemme->long_taille = $request->long_taille;
        $mfemme->long_robe = $request->long_robe;
        $mfemme->long_jupe = $request->long_jupe;
        $mfemme->epaule_manche = $request->epaule_manche;
        $mfemme->user_id = $utilisateur->id;
    
        $mfemme->update();
        return redirect()->route('mfemme');

        return back()->with("success", "Mésure Ajouté avec succès!");
    }

    public function delete(mfemme $mfemme){
        $epaule = $mfemme->epaule;
        $mfemme->delete();

        return back()->with("successDelete", "la mesure de $epaule supprimer avec succès!");
    }
}
