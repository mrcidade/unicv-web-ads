<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>View Padrão</title>
    <link href="/bootstrap.css" rel="stylesheet">
    <script src="/bootstrap.js"></script>
  </head>
  <body>
    <p>Código: {{ $usuario->id }}</p>
    <p>Nome: {{ $usuario->Nome }}</p>
    <p>Email: {{ $usuario->Email }}</p>
    <p>Idade: {{ $usuario->Idade }}</p>
    <p>Telefone: {{ $usuario->Telefone }}</p>
    <p><a href="/usuarios" class="btn btn-success">Voltar</a></p>
  </body>
</html>