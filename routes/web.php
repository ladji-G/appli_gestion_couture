<?php

use App\Http\Controllers\Admin\catalogueController;
use App\Http\Controllers\Admin\clientController;
use App\Http\Controllers\Admin\commandeController;
use App\Http\Controllers\Admin\employeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CouturierController;
use App\Http\Controllers\mfemmeController;
use App\Http\Controllers\mesureController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ProfileController;
use App\Models\catalogue;
use App\Models\panier;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


// .............................................Admin Route..................................................

Route::prefix('admin')->group(function () {


    // Route::get('/Mailcontenu', function () {
        
    //     return view('admin.Mailcontenu', compact('Message'));
    //     // return view('welcome');
    // });



    Route::get('/login', [AdminController::class, 'page'])->name('login_from');

    Route::post('/login/owner', [AdminController::class, 'Login'])->name('admin.login');

    Route::get('/dashboard', [AdminController::class, 'Dashboard'])->name('admin.dashboard')->middleware('admin');

    Route::post('/logout', [AdminController::class, 'AdminLogout'])->name('admin.logout')->middleware('admin');

    Route::get('/register', [AdminController::class, 'AdminRegister'])->name('admin.register');

    Route::post('/register/create', [AdminController::class, 'AdminRegisterCreate'])->name('admin.register.create');



    //employe
    Route::get("employe", [employeController::class, "employe"])->name("admin.employe")->middleware('admin');
    Route::get("employe/creer", [employeController::class, "creer"])->name("admin.employe.creer")->middleware('admin');
    Route::get("employe/{employe}", [employeController::class, "edit"])->name("admin.employe.edit")->middleware('admin');
    Route::post("employe/creer", [employeController::class, "Store"])->name("admin.employe.ajouter")->middleware('admin');
    Route::delete("employe/{employe}", [employeController::class, "delete"])->name("admin.employe.supprimer")->middleware('admin');
    Route::put("employe/{employe}", [employeController::class, "update"])->name("admin.employe.update")->middleware('admin');
    Route::put("employe/{employe}", [employeController::class, "statuts"])->name("admin.employe.statuts")->middleware('admin');

    // Client
    Route::get("client", [clientController::class, "client"])->name("admin.client")->middleware('admin');
    Route::delete("User/{id}", [clientController::class, "delete"])->name("admin.User.supprimer")->middleware('admin');

    //commandes
    Route::get("commande", [commandeController::class, "index"])->name("admin.commande")->middleware('admin');
    Route::get("commande/creer", [commandeController::class, "creer"])->name("admin.commande.creer")->middleware('admin');
    Route::post("commande/store", [commandeController::class, "store"])->name("admin.commande.store")->middleware('admin');
    Route::get("commande/terminer", [commandeController::class, "cmdtermine"])->name("admin.commande.terminer")->middleware('admin');
    Route::get("commande/cmdenvoyer/{id}", [commandeController::class, "cmdenvoyer"])->name("admin.commande.cmdenvoyer")->middleware('admin');


    //catalogues
    Route::get("catalogue", [catalogueController::class, "catalogue"])->name("admin.catalogue")->middleware('admin');
    Route::get("catalogue/creer", [catalogueController::class, "creer"])->name("admin.catalogue.creer")->middleware('admin');
    Route::get("catalogue/{catalogue}", [catalogueController::class, "edit"])->name("admin.catalogue.edit")->middleware('admin');
    Route::post("catalogue/creer", [catalogueController::class, "Store"])->name("admin.catalogue.ajouter")->middleware('admin');
    Route::delete("catalogue/{catalogue}", [catalogueController::class, "delete"])->name("admin.catalogue.supprimer")->middleware('admin');
    Route::put("catalogue/{catalogue}", [catalogueController::class, "update"])->name("admin.catalogue.update")->middleware('admin');
});

// ...........................................Fin Admin Route.................................................









// .............................................Couturier Route..................................................

Route::prefix('couturier')->group(function () {

    Route::get('/login', [CouturierController::class, 'pageC'])->name('couturier_login_from');

    Route::post('/login/owner', [CouturierController::class, 'CouturierLogin'])->name('couturier.login');

    Route::get('/dashboard', [CouturierController::class, 'CouturierDashboard'])->name('couturier.dashboard')->middleware('couturier');

    Route::post('/logout', [CouturierController::class, 'CouturierLogout'])->name('couturier.logout')->middleware('couturier');

    Route::get('/register', [CouturierController::class, 'CouturierRegister'])->name('couturier.register');

    Route::get('/tacheterminer/{id}', [CouturierController::class, 'tacheterminer'])->name('couturier.tacheterminer');
    

    Route::delete("Couturier/{id}", [CouturierController::class, "delete"])->name("couturier.Couturier.supprimer")->middleware('couturier');

    Route::post('/register/create', [CouturierController::class, 'store'])->name('couturier.register.create');
});

// ...........................................Fin Couturier Route.................................................














Route::get('/', function () {

    if (!isset($_SESSION)) {
        session_start();
    }

    $catalogue = catalogue::all();

    return view('welcome', compact('catalogue'));
    // return view('welcome');
});

Route::get('/dashboard', function () {
    $user = auth()->user();
    if (!isset($_SESSION)) {
        session_start();

    }
    $_SESSION['utilisateur'] = $user;
    $catalogue = catalogue::where('genre', '=', $user->genre)->get();

    if ($catalogue->count() == 0) {
        $catalogue = catalogue::all();
    }


    $panier = panier::where('user_id', '=', $user->id);

    $panier = panier::where('user_id', '=', $user->id)
        ->where('statut', '=', false)
        ->get();
    if (!isset($_SESSION)) {
        session_start();
    }
    $_SESSION['nbpanier'] = $panier->count();

    


    return view('dashboard', compact('catalogue', 'user'));
})->middleware(['auth', 'verified'])->name('dashboard');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');



    Route::get("catalogue", [catalogueController::class, "catalogue"])->name("catalogue");
    Route::get("dashboard/{genre}", [mesureController::class, "dashboard_genre"])->name("dashboard_genre");

    // Manipullation_Panier
    Route::get('cart', [ProductsController::class, 'cart'])->name('cart');
    Route::post('add-to-cart/{id}', [ProductsController::class, 'addToCart'])->name('add_to_cart');
    Route::post('valider/{id}', [ProductsController::class, 'valider'])->name('valider');
    Route::patch('update-cart', [ProductsController::class, 'update'])->name('update_cart');
    Route::delete('remove-from-cart', [ProductsController::class, 'remove'])->name('remove_from_cart');
    Route::delete("cart/{cart}", [ProductsController::class, "delete"])->name("cart.supprimer");


    // Commande
    Route::get("commande/terminer", [commandeController::class, "cmdclientermine"])->name("commande.terminer");
    Route::get("commande/information", [commandeController::class, "infoSurAtelier"])->name("commande.information");


    //Mesure pour homme
    Route::get("mesure", [mesureController::class, "mesure"])->name("mesure");
    Route::get("mesure/creer", [mesureController::class, "creer"])->name("mesure.creer");
    Route::get("mesure/{mesure}", [mesureController::class, "edit"])->name("mesure.edit");
    Route::post("mesure/creer", [mesureController::class, "Store"])->name("mesure.ajouter");
    Route::delete("mesure/{mesure}", [mesureController::class, "delete"])->name("mesure.supprimer");
    Route::put("mesure/{id}", [mesureController::class, "update"])->name("mesure.update");

    //Mesure pour femme
    Route::get("mfemme", [mfemmeController::class, "mfemme"])->name("mfemme");
    Route::get("mfemme/creer", [mfemmeController::class, "creer"])->name("mfemme.creer");
    Route::get("mfemmes/{mfemme}", [mfemmeController::class, "edit"])->name("mfemme.edit");
    Route::post("mfemme/creer", [mfemmeController::class, "Store"])->name("mfemme.ajouter");
    Route::delete("mfemme/{mfemme}", [mfemmeController::class, "delete"])->name("mfemme.supprimer");
    Route::put("mfemme/{id}", [mfemmeController::class, "update"])->name("mfemme.update");
});

require __DIR__ . '/auth.php';
