<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Models\Endereco;
use Illuminate\Support\Facades\Hash;
use App\Services\ClienteService;

class ClienteController extends Controller
{
    public function cadastrar(Request $request){
        $data = [];

        return view("cadastrar", $data);
    }

    public function cadastrarCliente(Request $request){
        //Obtem todos os valores do form
        $values = $request->all();
        $usuario = new Usuario();
        
        $usuario->fill($values); //Armazena os objetos que estao setados no fillable
        $usuario->login = $request->input("cpf", "");

        $senha = $request->input("password", "");
        $usuario->password = Hash::make($senha); //criptografa senha


        $endereco = new Endereco($values);
        $endereco->logradouro = $request->input("endereco", "");

        $clienteService = new ClienteService();
        $result = $clienteService->salvarUsuario($usuario, $endereco);

        $message = $result["message"];
        $status = $result["status"];

        $request->session()->flash($status, $message);


        return redirect()->route("cadastrar");
    }
}
