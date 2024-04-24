<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido a nuestro sistema de control escolar</title>
    <!-- Enlace al archivo CSS de Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Estilos personalizados -->
    <style>
        .jumbotrone {
            background-color: rgba(255,255,255,0.6);
            color: #000; 
            text-shadow: 2px 1px #46a8f2;
            border-radius: 5px;
        }
        .alert {
            background-color: #46a8f2; 
            color: #721c24;
            border-color: #f5c6cb; 
        }
        .bg-image {
            background-image: url('https://w.forfun.com/fetch/e4/e457b9d34976186039a603804c4774be.jpeg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-size: 100%;
            height: 92vh;
        }
    </style>
</head>
<body>
    @include('components.navbar')
    <div class="bg-image">
        <div class="container"> 
            <div class="row justify-content-center">
                <div class="col-md-8 mt-5">
                    <div class="jumbotrone text-center">
                        <h1>Sistema de control escolar del Kinder</h1>
                        <h2>La choza de los pequeñines</h2>
                        <h4 class="m-2" style="text-shadow: none;"> Inicia sesion, para ponerle 10 a tus alumnos que le echan ganas a la vida :D</h4>
                        
                        <img class="img-fluid pb-2" src="https://i.gifer.com/2eZU.gif" alt="Hamster gif">
                    </div>
                </div>
            </div>
        </div>

        @if (session('error'))
            <div class="alert alert-danger mt-3" role="alert">
                {{ session('error') }}
            </div>
        @endif

    </div>

    <!-- Enlace al archivo JavaScript de Bootstrap (opcional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>



