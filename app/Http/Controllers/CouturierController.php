<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\commande;
use App\Models\Couturier;
use App\Models\mfemme;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class CouturierController extends Controller
{

    // Login
    public function pageC()
    {


        return view("couturier.couturier_login");
    } //Fin methode



    // dashboard
    public function CouturierDashboard()
    {

        $auth = Auth::guard('couturier')->user();
        $commandes = commande::where('couturier_id','=', $auth->id)->where('statut','=',false)->with('user','mesure', 'panier')->get();
        
        
        
        //$mesure = mfemme::where('id','=',$commandes->user->id)->get();


        //  dd($commandes);


        return view('couturier.pageC',compact('commandes'));
    } // Fin methode

    public function tacheterminer(Request $request,string $id){

        
        $commande = commande::find($id);
        $commande->statut = 2;
        $commande->update();

        // $user->statuts = true;
        // $user->update();
        // $commande = new commande();
        // $commande->user_id = $request->client;
        // $commande->couturier_id = $request->employe;
        // $commande->save();

        // return redirect()->route('admin.commande');
        return back()->with('error', 'Mot de passe ou email incorrecte');

    }




    public function CouturierLogin(Request $request)
    {


        $check = $request->all();
        if (Auth::guard('couturier')->attempt(['email' => $check['email'], 'password' => $check['password']])) {

            return redirect()->route('couturier.dashboard')->with('error', 'Couturier Login  Successfully');
        } else {

            return back()->with('error', 'Mot de passe ou email incorrecte');
        }
    } //Fin methode


    public function CouturierLogout()
    {

        Auth::guard('couturier')->logout();
        if (!isset($_SESSION)){session_start();}
        session_destroy();
        return redirect()->route('couturier_login_from')->with('error', 'Couturier Logout Successfully');
    } //Fin methode


    public function CouturierRegister()
    {

        return view('couturier.couturier_register');
    } // Fin methode


    public function store(Request $request)
    {
        $request->validate([
            "genre" => "Required",
            "name" => "Required",
            "Prenom" => "Required",
            "adresse" => "Required",
            "telephone" => "Required",
            "email" => "Required",
            "specialite" => "Required",
            "salaire_horaire" => "Required",
            "password" => "Required",

        ]);
        $NomImage = $request->Nom . "_" . $request->Prenom;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filname = $NomImage . '.' . $extention;

            // URL du fichier distant
            $lienImge = 'uploads/Couturier/' . $filname;

            // Vérifier si le fichier existe
            $cpt = 1;
            while (file_exists($lienImge)) {
                $filname = $filname . $cpt++;
                $lienImge = 'uploads/Couturier/' . $filname;
            }

            $file->move('uploads/Couturier', $filname);
        }

        Couturier::create([
            "genre" => $request->genre,
            "name" => $request->name,
            "Prenom" => $request->Prenom,
            "adresse" => $request->adresse,
            "telephone" => $request->telephone,
            "email" => $request->email,
            "specialite" => $request->specialite,
            "salaire_horaire" => $request->salaire_horaire,
            "password" => $request->password,
            "image" => $filname
        ]);

        return redirect()->route('login_from');

        return back()->with("success", "Employé Ajouté avec succès!");
    } //Fin methode


    public function delete(Request $request ){
        $couturier = Couturier::find($request->id);
        $couturier->delete();

        $nom_complet = $couturier->name ." ". $couturier->Prenom;
       

        return back()->with("successDelete", "l'employé  $nom_complet supprimer avec succès!");
    }


}
