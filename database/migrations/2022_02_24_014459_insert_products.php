<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class InsertProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $cat = new \App\Models\Categoria(['categoria100' => 'Geral' ]);
        $cat->save();

        $prod = new \App\Models\Produto(['nome' => 'Iphone 4', 'valor' => 1000, 'foto' => 'imagens/iphone4.jpg', 'descricao' => '', 'categoria_id' => $cat->id]);
        $prod->save();

        $prod2 = new \App\Models\Produto(['nome' => 'Iphone 5', 'valor' => 2000, 'foto' => 'imagens/iphone5.jpg', 'descricao' => '', 'categoria_id' => $cat->id]);
        $prod2->save();

        $prod3 = new \App\Models\Produto(['nome' => 'Iphone 6', 'valor' => 3000, 'foto' => 'imagens/iphone6.jpg', 'descricao' => '', 'categoria_id' => $cat->id]);
        $prod3->save();

        $prod4 = new \App\Models\Produto(['nome' => 'Iphone 7', 'valor' => 4000, 'foto' => 'imagens/iphone7.jpg', 'descricao' => '', 'categoria_id' => $cat->id]);
        $prod4->save();

        $prod5 = new \App\Models\Produto(['nome' => 'Iphone X', 'valor' => 5000, 'foto' => 'imagens/iphonex.jpg', 'descricao' => '', 'categoria_id' => $cat->id]);
        $prod5->save();

        $prod6 = new \App\Models\Produto(['nome' => 'Iphone 11', 'valor' => 6000, 'foto' => 'imagens/iphone11.jpg', 'descricao' => '', 'categoria_id' => $cat->id]);
        $prod6->save();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
