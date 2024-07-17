<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function page(){

        return view('admin.admin_login');

    } //Fin methode


    public function Login(Request $request){

        // dd($request->all());

        $check = $request->all();
        if (Auth::guard('admin')->attempt(['email' => $check['email'], 'password' => $check['password'] ])) {
            

            return redirect()->route('admin.dashboard')->with('error', 'Admin Login  Successfully');
        }else{

            return back()->with('error', 'Mot de passe ou email incorrecte');
        }

    }//Fin methode

    public function Dashboard(){

        return view('admin.index');
    } //Fin methode

    public function AdminLogout(){

        Auth::guard('admin')->logout();
        if (!isset($_SESSION)){session_start();}
        session_destroy();
        return redirect()->route('login_from')->with('error', 'Admin Logout Successfully');

    } //Fin methode

     public function AdminRegister(){

        return view('admin.admin_register');

    } // Fin methode

    public function AdminRegisterCreate(Request $request){

        Admin::insert([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'name' => $request->name,   
            'created_at' => Carbon::now(),
        ]);

        
        return redirect()->route('login_from')->with('error', 'Admin crrer avec succès !');

    }

}
