<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Administrador</title>
    <!-- Enlace a Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Agrega enlaces a tus estilos CSS aquí si los tienes -->

    
    <style>
            .bg-image {
            background-image: url('https://w.forfun.com/fetch/e4/e457b9d34976186039a603804c4774be.jpeg');
            background-size: cover;
            background-position: center;
            background-repeat: repeat;
            background-size: 100%;
            height: 92vh;
        }
    </style>
</head>
<body class="bg-image text-center">

    <!-- Navbar -->
    <x-navbar />

    <div class="container mt-4"  style="background-color: rgba(222,226,230,0.68)">
        <h1 class="text-center">Panel de Administrador</h1>

        <!-- Alumnos -->
        <div class="card mb-4" style="background-color: rgba(222,226,230,0.68)">
            <div class="card-body">
                <h2 class="card-title" >Gestión de Alumnos</h2>
                @include('administradores.components.alumnos')
            </div>
        </div>

        <!-- Profesores -->
        <div class="card mb-4" >
            <div class="card-body">
                <h2 class="card-title" style="color: #007BFF;">Gestión de Profesores</h2>
                @include('administradores.components.profesores')
            </div>
        </div>

        <!-- Lista de Materias -->
        <div class="card mb-4" >
            <div class="card-body">
                <h2 class="card-title" style="color: #007BFF;">Lista de Materias</h2>
                @include('administradores.components.materias')
            </div>
        </div>

        <!-- Grupos -->
        <div class="card" >
            <div class="card-body">
                <h2 class="card-title" style="color: #007BFF;">Gestión de Grupos</h2>
                @include('administradores.components.grupos')
            </div>
        </div>
    </div>

    <!-- Enlaces a Bootstrap JS y jQuery (opcional) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <!-- Agrega enlaces a tus scripts JS aquí si los tienes -->
</body>
</html>
