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
    <h1>Listagem de Produtos</h1>
    <p><a href="/produtos/novo" class="btn btn-dark">Novo Produto</a></p>
    <table class="table">
        <thead>
            <tr>
                <th>Código</th>
                <th>Descrição</th>
                <th>Opções</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($produtos as $produto)
            <tr>
                <td>{{ $produto['codigo'] }}</td>
                <td>{{ $produto['descricao'] }}</td>
                <td><a href="/produtos/{{ $produto['codigo'] }}" class="btn btn-info">Visualizar</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
  </body>
</html>