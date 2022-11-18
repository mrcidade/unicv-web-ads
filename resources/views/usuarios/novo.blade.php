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
    <h1>Novo Usuario</h1>
    @if ($errors->any())
    <ul class="alert alert-danger">
    @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
    @endforeach
    </ul>
    @endif

    <form action="/usuarios/salvar" method="post" class="p-5">
        @csrf
        <div class="form-group">
            <label for="Nome">Nome</label>
            <input type="text" class="form-control" name="Nome" value="{{ old('Nome') }}">
        </div>
        <div class="form-group">
            <label for="Email">Email</label>
            <input type="email" class="form-control" name="Email" value="{{ old('Email') }}">
        </div>
        <div class="form-group">
            <label for="Idade">Idade</label>
            <input type="number" class="form-control" name="Idade" value="{{ old('Idade') }}">
        </div>
        <div class="form-group">
            <label for="Telefone">Telefone</label>
            <input type="tel" class="form-control" name="Telefone" value="{{ old('Telefone') }}">
        </div>
        <input type="submit" class="btn btn-success mt-5" value="Cadastrar">
    </form>
  </body>
</html>