@extends("layout")
@section("scriptjs")
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.8/jquery.mask.min.js" integrity="sha512-hAJgR+pK6+s492clbGlnrRnt2J1CJK6kZ82FZy08tm6XG2Xl/ex9oVZLE6Krz+W+Iv4Gsr8U2mGMdh0ckRH61Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
  $(function(){
      $("#cpf").mask("000.000.000-00")
  })
</script>
@endsection
@section("conteudo")
  <div class="col-12">
    <h2 class="mb-13">Login</h2>
    <form action="{{ route('logar') }}" method="post">
      @csrf
      <div class="form-group">
        Login
        <input type="text" name="login" class="form-control" id="cpf" />
      </div>
      <div class="form-group">
        Senha
        <input type="password" name="senha" class="form-control" />
      </div>
      <input type="submit" value="Logar" class="btn btn-lg btn-primary">
    </form>
  </div>

@endsection