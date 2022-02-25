<?php

namespace App\Services;

use App\Models\Usuario;
use App\Models\Endereco;
use Illuminate\Support\Facades\Log;

class ClienteService
{
  public function salvarUsuario(Usuario $usuario, Endereco $endereco)
  {
    try {
      $dbUsuario = Usuario::where("login", $usuario->login)->first(); // busca se ja existe um usuario cadastrado
      if($dbUsuario){
        return ['status' => 'err', 'message' => 'Usuario ja cadastrado'];

      }
      $usuario->save(); //salva o usuario
      $endereco->usuario_id = $usuario->id; // relaciona as tabelas
      $endereco->save(); // salva o endereco

      return ['status' => 'ok', 'message' => 'Usuario cadastrado com sucesso'];
    } catch (\Exception $e) {
      // Trata o erro
      Log::error("ERRO", [
        'file' => 'ClienteService.salvarUsuario',
        'message' => $e->getMessage()
      ]);

      return ['status' => 'err', 'message' => 'Erro ao cadastrar usuario'];
    }
  }
}
