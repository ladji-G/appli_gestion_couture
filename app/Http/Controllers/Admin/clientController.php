<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class clientController extends Controller
{
    public function client(){

        $client = User::orderBy("created_at", "asc")->get();

        return view("admin.client", compact("client"));
    }

    public function delete(Request $request ){
        $client = User::find($request->id);
        $client->delete();

        $nom_complet = $client->name ." ". $client->prenom;
       

        return back()->with("successDelete", "le client $nom_complet supprimer avec succès!");
    }
}
