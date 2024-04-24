<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calificaciones</title>
    <!-- Enlace a Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Agrega enlaces a tus estilos CSS aquí si los tienes -->
</head>
<body style=" color: #a54200;">

    <h1 class="text-center" style="color: #007BFF;">Calificaciones de {{ $user->name }}</h1>

    <div class="container mt-4">
        <table class="table table-striped table-hover"color: #007BFF;">
            <thead>
                <tr>
                    <th>Grupo</th>
                    <th>Materia</th>
                    <th>Calificación</th>
                </tr>
            </thead>
            <tbody>
                @foreach($gruposInscritos as $grupo)
                    <tr>
                        <td>{{ $grupo->id }}</td>
                        <td>{{ $grupo->materia->name }}</td>
                        <td>{{ $grupo->calificaciones()->max('calificacion')}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Enlaces a Bootstrap JS y jQuery (opcional) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <!-- Agrega enlaces a tus scripts JS aquí si los tienes -->
</body>
</html>
