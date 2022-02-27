<?php

namespace App\Services;

use App\Models\ItensPedido;
use App\Models\Pedido;
use App\Models\Usuario;
use Illuminate\Support\Facades\Log;

class VendaService
{
  public function finalizarVenda($prods = [], Usuario $usuario)
  {
    try {

      $dtHoje = new \DateTime();
      $pedido = new Pedido();
      $pedido->datapedido = $dtHoje->format("Y-m-d H:i:s");
      $pedido->status = "PEN";
      $pedido->usuario_id = $usuario->id;

      $pedido->save();

      foreach ($prods as $p) {
        $itens = new ItensPedido();

        $itens->quantidade = 1;
        $itens->valor = $p->valor;
        $itens->dt_item = $dtHoje->format("Y-m-d H:i:s");
        $itens->produto_id = $p->id;
        $itens->pedido_id = $pedido->id;
        $p->quantidade = $p->quantidade -1;
        $p->save();

        $itens->save();
      }
      return ['status' => 'ok', 'message' => 'Pedido finalizado com sucesso'];

    } catch (\Exception $e) {
      Log::err("ERRO: VENDA SERVICE", ['message' => $e->getMessage()]);
      return ['status' => 'err', 'message' => 'Pedido nao pode ser finalizado'];
    }
  }
}
