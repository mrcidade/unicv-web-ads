<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Users</title>
    <link href="bootstrap.css" rel="stylesheet">
    <script src="bootstrap.js"></script>
  </head>
  <body>
    <h1>Users</h1>
    <table class="table">
    <tr>
        <td>Nome</td>
        <td>E-mail</td>
        <td>Idade</td>
        <td>Telefone</td>
    </tr>
    @foreach ($usuarios as $usuario)
        <tr>
        <td>{{ $usuario->Nome }}</td>
            <td>{{ $usuario->Email }}</td>
            <td>{{ $usuario->Idade }}</td>
            <td>{{ $usuario->Telefone }}</td>
        </tr>
    @endforeach
    </table>
  </body>
</html>