<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsuarioController extends Controller
{
    public function logar(Request $request){
        $data = [];

        if($request->isMethod("POST")){
            //Caso o usuario clique no botao de login, a aplicacao entra nesse if
            $login = $request->input("login");
            $senha = $request->input("senha");

            $login = preg_replace("/[^0-9]/", "", $login);

            $credential = ['login' => $login, 'password' => $senha];

            //logar
            if(Auth::attempt($credential)){
                return redirect()->route("home");
            }else{
                $request->session()->flash("err", "Usuario ou senha invalidos");
                return redirect()->route("logar");
            }

        }

        return view("logar", $data);
    }
}
