<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Winner Email</title>
     <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>

    <h1>Parabens, foste sorteado no {{ $sweepstake->title }}</h1>

    <div>
        <p>Descricao: {{ $sweepstake->description }}</p>
    </div>

    <div>
        <p>Alguem entrara em contacto contigo</p>
    </div>

</body>

</html>
