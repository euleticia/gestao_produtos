<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Shop - Dream iPhones Br</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  @yield("scriptjs")
</head>
<body>
  <nav class="navbar navbar-light navbar-expand-md bg-light pl-5 pr-5 mb-5">
    <a href="#" class="navbar-brand">Shop</a>
    <div class="collapse navbar-collapse">
      <div class="navbar-nav">
        <a class="nav-link" href="{{ route('home') }}">Home</a>
        <a class="nav-link" href="{{ route('categoria') }}">Categorias</a>
        <a class="nav-link" href="{{ route('cadastrar') }}">Cadastrar</a>
        <a class="nav-link" href="{{ route('logar') }}">Login</a>
      </div>
    </div>
    <a href="{{ route('ver_carrinho') }}" class="btn btn-sm"><i class="fa fa-shopping-cart"></i></a>
  </nav>

<div class="container">
  <div class="row">
    @if($message = Session::get("err"))
    <div class="col-12">
      <div class="alert alert-danger">{{ $message }}</div>
    </div>
    @endif

    @if($message = Session::get("ok"))
    <div class="col-12">
      <div class="alert alert-success">{{ $message }}</div>
    </div>
    @endif
       <!-- Div onde os outros arquivos adicionarão conteudos -->
   @yield("conteudo")
  </div>

</div>

</body>
</html>