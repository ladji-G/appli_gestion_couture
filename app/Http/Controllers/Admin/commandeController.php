<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\MessageGoogle;
use App\Models\commande;
use App\Models\Couturier;
use App\Models\employe;
use App\Models\panier;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class commandeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       
        $commandes = commande::all();
        // with('panier', function($query){
        //     $query->with('user');
        // })->get();
        return view("admin.commande", compact("commandes"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function creer()
    {

        $client = User::orderBy("created_at", "asc")
        ->where('statuts','=',false)
        ->get();
        $paniers = panier::orderBy("created_at", "asc")
        ->where('bloquer', false)
        ->get();
        $listemploye = Couturier::orderBy("name", "asc")
       ->where('statuts', '=', true)->get();
       

        return view("admin.form/creercommande", compact('client','listemploye', 'paniers'));
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            "employe"=>"Required|numeric", 
            "panier"=>"Required|numeric"
        ]);
        $panier = panier::find($request->panier);

        $panier->bloquer = true;
        $panier->save();

        $user = $panier->user;
        $employe = Couturier::find($request->employe);  
        $employe->statuts = true;
        $employe->update();

        $user->statuts = 2;
        $user->update();
        $commandes = new commande();
        $commandes->panier_id = $request->panier;
        $commandes->couturier_id = $request->employe;
        $commandes->save();

        

        return redirect()->route('admin.commande');

        return back()->with("success", "Commande attribué avec succès !");
        
    }// fin methode


    public function cmdtermine(){

        $commandes = commande::where('statut','=',2)->get();

        $commandess = commande::where('statut','=',3)->get();
        return view('admin.cmdterminer', compact('commandes', 'commandess'));

    }

    public function cmdenvoyer(Request $request){

        if (!@fsockopen('www.google.fr' , 80, $num, $error, 5)) {
            return back()->with('errors', "verrifiez l'état de votre connexion!");
        }
        
        $commande = commande::where('id', '=', $request->id)->with('panier')->first();
        $commande->statut = 3;
        $commande->update();

        $panierUser = panier::where('id', '=', $commande->panier->id)->with('user')->first();
        $emailUser = $panierUser->user->email;
        $NomUser = $panierUser->user->name." ".$panierUser->user->prenom;
        $Message = $NomUser.", votre colis est prêt. Vous pouvez passez à l'atelier pour le recuperer !";
        Mail::to($emailUser)->send(new MessageGoogle($Message));

        // dd($emailUser);
        return back()->with("success", "Commande attribué avec succès !");

    }


    public function cmdclientermine(){

        $user = auth()->user();

        $commandes = commande::where('statut','=',3)
        ->with('panier', function($query) use($user){
            $query->where('user_id', '=', $user->id);
        })->get();
        return  view('cmdclientterminer',  compact('commandes'));

    }


    public function marquer($id)
{
    // Recherchez l'objet en fonction de l'ID
    $unclient = commande::find($id);

    // Marquez l'objet en le mettant à jour dans la base de données ou en utilisant une logique appropriée
    $unclient->marque = true;
    $unclient->save();

    // Redirigez l'utilisateur vers une autre page ou actualisez la page actuelle
    return redirect()->back();
}

public function infoSurAtelier(){
    return view('infoAtelier');
}





    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
