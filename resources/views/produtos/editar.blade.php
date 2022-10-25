<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>View Padrão</title>
    <link href="/bootstrap.css" rel="stylesheet">
    <script src="/bootstrap.js"></script>
  </head>
  <body class="p-5">
    <h1>Editar Produto</h1>
    @if ($errors->any())
    <ul class="alert alert-danger">
    @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
    @endforeach
    </ul>
    @endif

    <form action="/produtos/gravar/{{ $produto->id }}" method="post" class="p-5">
        @csrf
        <div class="form-group">
            <label for="descricao">Descrição</label>
            <input type="text" class="form-control" name="descricao" value="{{ $produto->descricao }}">
        </div>
        <div class="form-group">
            <label for="preco">Preço</label>
            <input type="number" class="form-control" name="preco" value="{{ $produto->preco }}">
        </div>
        <div class="form-group">
            <label for="quantidade">Quantidade</label>
            <input type="text" class="form-control" name="quantidade" value="{{ $produto->quantidade }}">
        </div>
        <input type="submit" class="btn btn-success mt-5" value="Salvar">
    </form>
  </body>
</html>