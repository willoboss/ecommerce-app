<?php

namespace App\Http\Controllers;


use App\Models\admin;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class adminController extends Controller
{
    public function index(){
        return view("admin.login");
    }
    public function AdminLogin(Request $request){
        //dd($request->all());
        $check=$request->all();
        if(Auth::guard("admin")->attempt(['email'=> $check['email'],'password'=> $check['password']] )){
            return redirect()->route("admin.dashboard")->with('success','Admin Bien connecté!!');
        } else {
            return back()->with('error',' email ou mot de passe invalide!');
        }
    }

    public function Dashboard(){
        return view("admin.dashboard");
    }



    public function Register(){
        return view("admin.register");
    }
    public function AdminRegister(Request $request){
        #dd($request->all());

        admin::insert([
            "name"=> $request->name,
            "email"=> $request->email,
            "password"=>Hash::make($request->password),
            "created_at"=>Carbon::now(),

        ]);

        return redirect()->route("login_form")->with("success","Admin Enregistrer!");

    }

    public function Logout(){
        Auth::guard('admin')->logout();
        return redirect()->route("login_form")->with('error','Admin deconnecté!!');
    }

    public function Articles(){
        return view("admin.article");
    }
}
