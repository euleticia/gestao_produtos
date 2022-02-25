<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Produto;
use App\Services\VendaService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProdutoController extends Controller
{
    public function index(Request $request){

        $data = [];

        //Busca todos os produtos
        $listaProdutos = Produto::all();
        $data["lista"] = $listaProdutos;

        return view("home", $data);
    }

    public function categoria($idcategoria = 0, Request $request){
        $data = [];

        //Lista categorias
        $listaCategorias = Categoria::all();
        //Lista produtos limitando a 4
        $queryProduto = Produto::limit(4);

        if($idcategoria != 0){
            $queryProduto->where("categoria_id", $idcategoria);
        }

        $listaProdutos = $queryProduto->get();

        $data["lista"] = $listaProdutos;
        $data["listaCategoria"] = $listaCategorias;
        $data["idcategoria"] = $idcategoria;
        return view("categoria", $data);
    }

    public function adicionarCarrinho($idProduto = 0, Request $request){
        //Buscar produto pelo id
        $prod = Produto::find($idProduto);

        if($prod){
            //se encontrou um produto

            //Buscar carrinho da sessao atual
            $carrinho = session('cart', []);

            array_push($carrinho, $prod);
            session([ 'cart' => $carrinho ]);
        }

        return redirect()->route("home");

    }

    public function verCarrinho(Request $request){
        $carrinho = session('cart', []);
        $data = ['cart' => $carrinho];

        return view("carrinho", $data);

    }

    public function excluirCarrinho($indice, Request $request){
        $carrinho = session('cart', []);
        if(isset($carrinho[$indice])){
            unset($carrinho[$indice]);
        }

        session(["cart" => $carrinho]);
        return redirect()->route("ver_carrinho");
    }

    public function finalizar(Request $request){

        $prods = session('cart', []);
        $vendaService = new VendaService;
       $result = $vendaService->finalizarVenda($prods, Auth::user());

       if($result["status"] == "ok"){
           $request()->session()->forget("cart");
       }

       $request->session()->flash($result["status"], $result["message"]);        
        return redirect()->route("ver_carrinho");

    }
}
