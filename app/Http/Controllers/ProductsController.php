<?php

namespace App\Http\Controllers;

use App\Mail\MessageGoogle;
use App\Models\catalogue;
use App\Models\panier;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use PHPUnit\Framework\Constraint\IsTrue;

class ProductsController extends Controller
{

    // count
    // juste avant la page return
    // if (!isset($_SESSION)){session_start();}
    //
    // $panier = panier::
    //     where('user_id','=', $utilisateur->id)
    //    -> where('statut','=', false)
    //     ->get();
    // $_SESSION['panier'] = $panier;


    // nav
    // $_SESSION['panier']->count();




    public function index()
    {
        $catalogues = catalogue::all();
        return view('catalogue', compact('catalogues'));
    }


    public function cart()
    {
        $utilisateur = auth()->user();

        $panier = panier::where('user_id', '=', $utilisateur->id)
            ->where('statut', '=', false)
            ->get();

        return view('cart', compact('panier'));
    }
    public function addToCart($id)
    {

        $utilisateur = auth()->user();


        $catalogue = catalogue::findOrFail($id);


        $panier = new panier();
        $panier->user_id = $utilisateur->id;
        $panier->Nom = $catalogue->Nom;
        $panier->photo = $catalogue->cover_image;
        $panier->quantite = 1;
        $panier->save();


        $panier = panier::where('user_id', '=', $utilisateur->id)
            ->where('statut', '=', false)
            ->get();
        if (!isset($_SESSION)) {
            session_start();
        }
        $_SESSION['nbpanier'] = $panier->count();



        if (isset($cart[$id])) {
            $panier = panier::where('user_id', '=', $utilisateur->id)
                ->count();

            // }  else {
            //     $cart[$id] = [

            //         "Nom" => $catalogue->Nom,
            //         "cover_image" => $catalogue->cover_image,
            //         "quantity" => 1
            //     ];
        }


        // session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Modèle ajouté au panier avec succès!');
    }

    public function valider($id)
    {

        $utilisateur = auth()->user();


        $utilisateur->statuts = false;
        //  $utilisateur->update();
        $statutUser = User::find($utilisateur->id);
        $statutUser->update(['statuts' => 0]);


        $emailUser = $utilisateur->email;
        $NomUser = $utilisateur->name.' '.$utilisateur->prenom;

        if (!@fsockopen('www.google.fr' , 80, $num, $error, 5)) {
            return back()->with('errors', "verrifiez l'état de votre internet!");
        }

        //dd('jerfcfyckykc');
        $Message = $NomUser.", nous avons bien reçu votre commande ! <br>Pour la réalisation
        de votre commande, vous devez vous acquiter de 40% du prix du modèle choisi.<br><br><br>
        Voir page !!Plus d'info !! ";
        Mail::to($emailUser)->send(new MessageGoogle($Message));

        $panier = panier::findOrFail($id);
        $panier->statut = True;
        $panier->bloquer = false;

        $panier->update();
        $cart = session()->get('cart', []);
        // if(isset($cart[$id])) {
        // }  else {
        //     $cart[$id] = [
        //         "Nom" => $catalogue->Nom,
        //         "cover_image" => $catalogue->cover_image,
        //         "quantity" => 1
        //     ];
        // }


        foreach ($cart as $userData) {
            $panier = new panier();
            $panier->user_id = $utilisateur->id;
            $panier->Nom = $userData['Nom'];
            $panier->photo = $userData['cover_image'];
            $panier->quantite = $userData['quantity'];
            $panier->save();
        }


        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Modèle ajouté au panier avec succès!');
    }

    public function update(Request $request)
    {
        if ($request->id && $request->quantity) {
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);

            $utilisateur = auth()->user();
            $panier = panier::where('user_id', '=', $utilisateur->id)->where('statut', '=', false)->get();
            if (!isset($_SESSION)) {
                session_start();
            }
            $_SESSION['nbpanier'] = $panier->count();

            session()->flash('success', 'Cart successfully updated!');
        }
    }

    public function remove(Request $request)
    {
        if ($request->id) {
            $panier = panier::find($request->id);
            $panier->delete();



            $utilisateur = auth()->user();
            $panier = panier::where('user_id', '=', $utilisateur->id)->where('statut', '=', false)->get();
            if (!isset($_SESSION)) {
                session_start();
            }
            $_SESSION['nbpanier'] = $panier->count();

            session()->flash('success', 'Modèle supprimé avec succès!');
        }
    }
}
