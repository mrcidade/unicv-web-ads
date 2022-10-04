<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="bootstrap.css" rel="stylesheet">
    <script src="bootstrap.js"></script>
  </head>
  <body>
    <h1>Olá {{ $nome ?? 'Sem nome' }} {{ $sobrenome }}!</h1>
    
    @if ($numero > 1)
        <p>É maior</p>
    @else
        <p>Menor</p>
    @endif
  </body>
</html>