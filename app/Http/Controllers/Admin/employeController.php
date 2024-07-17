<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Couturier;
use App\Models\employe;
use Illuminate\Http\Request;

class employeController extends Controller
{
    public function employe(){

        $couturiers = Couturier::orderBy("name", "asc")->get();

        // dd($couturier);

        return view("admin.employe", compact("couturiers"));
    }

    // public function creer(){

    //     $classes = Couturier::all();
        

    //     return view("admin/form/creerEmployes", compact("classes"));
    // }

    public function edit(Couturier $couturier){

        $classes = Couturier::all();

        return view("admin/formModif/modifEmployes", compact("classes"));
    }

    public function store(Request $request ){
       $request->validate([
            "Nom"=>"Required",
            "Prenom"=>"Required",
            "adresse"=>"Required",
            "telephone"=>"Required",
            "email"=>"Required",
            "position"=>"Required",
            "salaire_horaire"=>"Required",
            
        ]);
        $NomImage = $request->Nom."_".$request->Prenom;
        if($request->hasFile('image')) {
            $file = $request->file('image');
            $extention = $file ->getClientOriginalExtension();
            $filname = $NomImage.'.'.$extention;
            
            // URL du fichier distant
            $lienImge = 'uploads/employe/'.$filname;

            // Vérifier si le fichier existe
            $cpt=1;
            while (file_exists($lienImge)){
                $filname = $filname.$cpt++;
                $lienImge = 'uploads/employe/'.$filname;
            }

            $file->move('uploads/employe', $filname);
        }



        employe::create([
            "Nom"=>$request->Nom,
            "Prenom"=>$request->Prenom,
            "adresse"=>$request->adresse,
            "telephone"=>$request->telephone,
            "email"=>$request->email,
            "position"=>$request->position,
            "salaire_horaire"=>$request->salaire_horaire,
            "image"=>$filname
        ]);
        return redirect()->route('admin.employe');

        return back()->with("success", "Employé Ajouté avec succès!");
    }

    public function update(Request $request, Couturier $couturier){
        $request->validate([
            "Nom"=>"Required",
            "Prenom"=>"Required",
            "adresse"=>"Required",
            "telephone"=>"Required",
            "email"=>"Required",
            "specialite"=>"Required",
            "salaire_horaire"=>"Required",
            "image" =>"Required"
        ]);
        $couturier->update($request->all());

        return redirect()->route('admin.employe');

        return back()->with("success", "Employé Ajouté avec succès!");
    }

    public function delete(Couturier $couturier){
        $nom_complet = $couturier->name ." ". $couturier->Prenom;
        $couturier->delete();

        return back()->with("successDelete", "l'employé $nom_complet supprimer avec succès!");
    }

    public function statuts(Request $request){

        $couturier = Couturier::where('id', '=', $request->id)->with('Couturier')->first();
        $couturier->statuts = 2;
        $couturier->update();




        return back()->with("success", "l'employé desactivé avec succès!");
    }
}
