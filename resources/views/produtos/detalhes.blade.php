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
    <h1>{{ $produto->descricao }}</h1>
    <p>Código: {{ $produto->id }}</p>
    <p>Preço: {{ $produto->preco }}</p>
    <p>Quantidade: {{ $produto->quantidade }}</p>
    <p><a href="/produtos" class="btn btn-success">Voltar</a></p>
  </body>
</html>