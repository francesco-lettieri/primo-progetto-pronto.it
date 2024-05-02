<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Presto.it</title>
</head>
<body>
    <div>
      <h1>L'utente {{$user->name}} ha richiesto di lavorare con noi</h1>
      <h2>Questa è la sua mail : </h2>
      <p>{{$user->email}}</p>
      <p>SE vuoi renderlo revisore clicca qui:</p>
      <a href="{{route('make.revisor',compact('user'))}}">Rendi Revisore</a>
    </div>
</body>
</html>


