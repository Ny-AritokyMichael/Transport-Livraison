<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function redirectPage()
    {
        return view('admin.LogAdmin');
    }

    public function logAdmin(Request $request)
    {
        $email = trim($request->get('email'));
        $mdp = trim($request->get('mdp'));

        $admins = Admin::query()
            ->where('email', '=', "{$email}")
            ->where('password', '=', "{$mdp}")
            ->get()
            ->count();

            if($admins == 1){
                return view('admin.acceuil');

            }else{
                return view('erreur.erreurAdmin')->with('not access');
            }
    }

    public function deconnexion(){
        return view('index');
    }
}
