<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <!-- Enlace a Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Agrega enlaces a tus estilos CSS aquí si los tienes -->

    <style>
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
<body class="bg-image text-center">

    <x-navbar />

    <div class="container mt-4 " style="background-color: rgba(222,226,230,0.68)">
        <h1 class="heading">Bienvenido Alumno</h1>

        <p><strong>Nombre:</strong> {{ $user->name }}</p>
        <p><strong>Correo Electrónico:</strong> {{ $user->email }}</p>

        <div class="card mt-4">
            <div class="card-body">
                <h2>Registrarse en un Grupo</h2>
                <form action="{{ route('registrar-grupo') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="grupo" class="form-label">Selecciona un Grupo:</label>
                        <select name="grupo" id="grupo" class="form-select" style="color: #007BFF;">
                            @foreach($gruposDisponibles as $grupo)
                                <option value="{{ $grupo->id }}">{{ $grupo->materia->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-outline-primary fs-4">Registrarse en Grupo</button>
                </form>
            </div>
        </div>

        <!-- Mostrar los grupos inscritos del usuario (alumno) -->
        <div class="card mt-4" style="">
            <div class="card-body">
                <h2>Grupos Inscritos con Calificaciones:</h2>
                <ul class="list-group m-5">
                    @foreach($gruposInscritos as $grupo)
                        <li class="list-group-item" style="color: #007BFF;">
                            {{ $grupo->materia->name }}:
                            @php
                                // Obtener la calificación promedio para este grupo
                                $calificacionPromedio = $grupo->calificaciones()->max('calificacion');
                            @endphp
                            @if($calificacionPromedio !== null)
                                {{ $calificacionPromedio }}
                            @else
                                Sin calificación
                            @endif
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>

    <!-- Botón para generar PDF -->
    <div class="container mt-4">
        <form action="{{ route('generar-pdf') }}" method="GET">
            @csrf
            <button type="submit" class="btn btn-success fs-4" style=";">Generar PDF de Calificaciones</button>
        </form>
    </div>

    <!-- Enlaces a Bootstrap JS y jQuery (opcional) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <!-- Agrega enlaces a tus scripts JS aquí si los tienes -->
</body>
</html>
