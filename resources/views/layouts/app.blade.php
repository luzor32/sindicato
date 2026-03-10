<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Sindicato</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- FontAwesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
</head>

<body style="padding-top:90px;">

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-dark bg-danger fixed-top">
<div class="container">

<a class="navbar-brand" href="{{ route('dashboard') }}">
<img src="{{ asset('img/logo-seoc.png') }}" 
                    alt="Logo Sindicato" 
                    style="height:50px; width:auto;"> Home
</a>

<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
<span class="navbar-toggler-icon"></span>
</button>

<div class="collapse navbar-collapse" id="navbarNav">

<ul class="navbar-nav me-auto">

<li class="nav-item">
<a class="nav-link text-white" href="{{ route('afiliados.index') }}">
    <i class="fa-solid fa-users"></i> Solicitud
</a>

</li>

</ul>

</div>
        <div>
                <a href="{{ route('afiliados.create') }}" class="btn btn-light">
                    <i class="fas fa-plus"></i> Nuevo Afiliado
                </a>
            </div>

</div>
</nav>

<!-- CONTENIDO -->
<div class="container mt-4">
@yield('content')
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

@yield('scripts')

</body>
</html>