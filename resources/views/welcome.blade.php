<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Bienvenido</title>
    <link href="{{ asset('css/layout.css') }}" rel="stylesheet">
    <link href="{{ asset('css/navbar.css') }}" rel="stylesheet">
    <link href="{{ asset('css/footer.css') }}" rel="stylesheet">
</head>
<body>
    @include('layouts.header')
    <div class="container mt-4">
        <h1>Bienvenido a Laravel</h1>
        @if (session('error'))
            <div class="container">
                <div class="alert6">
                    <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                    {{ session('error') }}
                </div>
            </div>
        @endif
        @if (session('create'))
        <div class="container">
            <div class="alert2">
                <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                {{ session('error') }}
            </div>
        </div>
        @endif
    </div>


    @include('layouts.footer')
</body>

</html>
