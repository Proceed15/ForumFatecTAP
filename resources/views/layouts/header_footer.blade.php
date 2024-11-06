<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8" />
</head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" href="{{ asset('css/app.css') }}">
<link rel="stylesheet" href="{{ asset('vendor/font-awesome/css/all.min.css') }}">
<script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
</script>
<link rel="stylesheet" href="{{ asset('css/app.css') }}">
<link href="{{ mix('css/app.css') }}" rel="stylesheet">
<title> Fórum - Laravel </title>
</head>

<body>
    
    <!-- <div id="app"></div> -->
    
    <main>
        @yield('content')
    </main>

    <!-- <div id="footer"></div> -->

</body>
<script src="{{ mix('js/app.js') }}"></script>
</html>

