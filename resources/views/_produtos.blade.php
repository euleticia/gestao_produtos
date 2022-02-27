@if(isset($lista))
<div class="row">
    @foreach($lista as $prod)
    <div class="col-3 mb-3">
      <div class="card">
        <img src="{{ asset($prod->foto) }}" class="card-img-top" />
        <div class="card-bsody">
          <h6 class="card-title">{{ $prod->nome }} - R$ {{ $prod->valor }} - Disponiveis: {{$prod->quantidade}}</h6>
          @if($prod->quantidade)
          <a href="{{ route('adicionar_carrinho', ['idproduto' => $prod->id ]) }}" class="btn btn-sm btn-secondary">Adicionar item</a>
          @else
          <a>Produto esgotado</a>
          @endif
        </div>
      </div>
    </div>
    @endforeach
  </div>
@endif