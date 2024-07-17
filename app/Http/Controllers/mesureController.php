<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\catalogue;
use App\Models\mesure;
use App\Models\panier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class mesureController extends Controller
{
    public function mesure(){



        $utilisateur = auth()->user();

        $mesures  = mesure::all()->where('user_id','=',$utilisateur->id);

        return view("mesure", compact("mesures"));
        
    }

    public function creer(){
        $utilisateur = auth()->user();
         

        return view("form/creermesures", compact("utilisateur"));
        
    }

    public function edit(mesure $mesure){

        $mesures = mesure::all();

        return view("formModif/modifmesures", compact("mesures"));
    }

    public function store(Request $request){
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
        $mesure = new mesure();
        $mesure ->nom = $request->nom;
        $mesure->epaule = $request->epaule;
        $mesure->long_manche = $request->long_manche;
        $mesure->t_manche = $request->t_manche;
        $mesure->poitrine = $request->poitrine;
        $mesure->dos = $request->dos;
        $mesure->frappe = $request->frappe;
        $mesure->ceinture = $request->ceinture;
        $mesure->long_pentalon = $request->long_pentalon;
        $mesure->cuisse = $request->cuisse;
        $mesure->bassin = $request->bassin;
        $mesure->long_genou = $request->long_genou;
        $mesure->bas = $request->bas;
        $mesure->t_taille = $request->t_taille;
        $mesure->long_totale = $request->long_totale;
        $mesure->long_taille = $request->long_taille;
        $mesure->long_robe = $request->long_robe;
        $mesure->long_jupe = $request->long_jupe;
        $mesure->epaule_manche = $request->epaule_manche;
        $mesure->user_id = $utilisateur->id;
            
        $mesure->save();
        
        return redirect()->route('mesure');

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
            "epaule_manche"=>"Required",
        ]);
        $mesure = mesure::find($request->id);
        $mesure->nom = $request->nom;
        $mesure->epaule = $request->epaule;
        $mesure->long_manche = $request->long_manche;
        $mesure->t_manche = $request->t_manche;
        $mesure->poitrine = $request->poitrine;
        $mesure->dos = $request->dos;
        $mesure->frappe = $request->frappe;
        $mesure->ceinture = $request->ceinture;
        $mesure->long_pentalon = $request->long_pentalon;
        $mesure->cuisse = $request->cuisse;
        $mesure->bassin = $request->bassin;
        $mesure->long_genou = $request->long_genou;
        $mesure->bas = $request->bas;
        $mesure->t_taille = $request->t_taille;
        $mesure->long_totale = $request->long_totale;
        $mesure->long_taille = $request->long_taille;
        $mesure->long_robe = $request->long_robe;
        $mesure->long_jupe = $request->long_jupe;
        $mesure->epaule_manche = $request->epaule_manche;
        $mesure->user_id = $utilisateur->id;
    
        $mesure->update();
        return redirect()->route('mesure');

        return back()->with("success", "Mésure Ajouté avec succès!");
    }

    public function delete(mesure $mesure){
        $epaule = $mesure->epaule;
        $mesure->delete();

        return back()->with("successDelete", "la mesure de $epaule supprimer avec succès!");
    }


    public function dashboard_genre($genre)
    {
        $user = auth()->user();
        if (!isset($_SESSION)) {
            session_start();
    
        }
        $_SESSION['utilisateur'] = $user;
        $catalogue = catalogue::where('genre', '=', $genre)->get();
        $panier = panier::where('user_id', '=', $user->id);
    
        $panier = panier::where('user_id', '=', $user->id)
            ->where('statut', '=', false)
            ->get();
        if (!isset($_SESSION)) {
            session_start();
        }
        $_SESSION['nbpanier'] = $panier->count();
    
        return view('dashboard', compact('catalogue', 'user'));
       
    }
}
