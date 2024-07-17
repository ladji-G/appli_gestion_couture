<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\catalogue;
use App\Models\panier;
use Illuminate\Http\Request;

class catalogueController extends Controller
{
    public function catalogue(){

        $catalogue = catalogue::orderBy("created_at", "asc")->get();
        
       
        return view("admin.catalogue", compact("somPanier"));
    }
    public function addToCart($id)
    {
        $catalogue = catalogue::findOrFail($id);
 
        $cart = session()->get('cart', []);
 
        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
        }  else {
            $cart[$id] = [
                "Nom" => $catalogue->Nom,
                "cover_image" => $catalogue->cover_image,
                "quantity" => 1
            ];
        }
        
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Product add to cart successfully!');
    }

    

    public function creer(){

        $listecatalogues = catalogue::all();
            
        return view("admin/form/creercatalogues", compact("listecatalogues"));
    }


    public function edit(catalogue $catalogue){

        $classes = catalogue::all();

        return view("admin/formModif/modifCatalogues", compact("catalogue", "classes"));
    }

    public function store(Request $request){
        $request->validate([
            "genre"=>"Required",
            "Nom"=>"Required",
            "Desciption"=>"Required",
            "cover_image"=>"Required"
        ]);


        $filename = time(). '.'. $request->cover_image->extension();
        $path = $request->file('cover_image')->storeAs('images', $filename, 'public');

        // dd($path);





        catalogue::create([
            "genre"=>$request->genre,
            "Nom"=>$request->Nom,
            "Desciption"=>$request->Desciption,
            "cover_image"=>$path
        ]);

        return redirect()->route('admin.catalogue');

        return back()->with("success", "Image Ajoutée avec succès!");
    }

    public function update(Request $request, catalogue $catalogue){
        $request->validate([
            "Nom"=>"Required",
            "Desciption"=>"Required"
        ]);
        // $catalogues->update($request->all());
        $catalogue->update([
            "Nom"=>$request->Nom,
            "Desciption"=>$request->Desciption
        ]);


        return redirect()->route('admin.catalogue');

        return back()->with("success", "Image Ajoutée avec succès!");
    }

    public function delete(catalogue $catalogue){
        $nom_complet = $catalogue->Nom;
        $catalogue->delete();

        return back()->with("successDelete", "l'image $nom_complet supprimer avec succès!");
        
    }

    
}
