@extends("layout")
@section("conteudo")
<div class="col-2">
  @if(isset($listaCategoria) && count($listaCategoria) > 0)
  <div class="list-group">

    @foreach($listaCategoria as $cat)
    <a href="{{ route('categoria_por_id', ['idcategoria' => $cat->id]) }}" 
      class="list-group-item list-gorup-item-action @if($cat->id == $idcategoria) active @endif"> {{ $cat->categoria100 }}</a>
    @endforeach

  </div>
  @endif
</div>

<div class="col-10">
  @include("_produtos", ['lista' => $lista])
</div>


@endsection