<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <!-- Enlace a Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Agrega enlaces a tus estilos CSS aquí si los tienes -->
</head>
<body>

    <!-- Navbar -->
    <x-navbar />

    <div class="container mt-4">
        <h1>Bienvenido Maestro</h1>

        <p><strong>Nombre:</strong> {{ $user->name }}</p>
        <p><strong>Correo Electrónico:</strong> {{ $user->email }}</p>

        <!-- Mostrar los grupos inscritos del usuario (maestro) -->
        <h2>Grupos a Cargo:</h2>
        <ul class="list-group">
        @foreach ($grupos as $grupo)
            <li class="list-group-item">
                <h3>{{ $grupo->nombre }}</h3>
                <p><strong>Materia:</strong> {{ $grupo->materia->name }}</p>
                <p><strong>Alumnos:</strong></p>
                <ul class="list-group">
                @foreach ($grupo->alumnos as $alumno)
                    <li class="list-group-item">
                        {{ $alumno->user->name }} - 
                        @php
                            $calificacion = $alumno->calificaciones->where('grupo_id', $grupo->id)->first();
                            if ($calificacion) {
                                echo 'Calificación: ' . $calificacion->calificacion;
                            } else {
                                echo 'Sin calificación';
                            }
                        @endphp
                        <form action="{{ route('calificaciones.update', ['alumno_id' => $alumno->id, 'grupo_id' => $grupo->id]) }}" method="post">
                            @csrf
                            @method('PUT')
                            <label for="calificacion">Nueva calificación:</label>
                            <input type="number" name="calificacion" id="calificacion" value="{{ $calificacion ? $calificacion->calificacion : '' }}" required class="form-control">
                            <button type="submit" class="btn btn-primary mt-2">Actualizar</button>
                        </form>
                    </li>
                @endforeach
                </ul>
            </li>
        @endforeach
        </ul>
    </div>

    <!-- Formulario para abrir un nuevo grupo -->
    <div class="container mt-4">
        <h2>Abrir Nuevo Grupo</h2>
        <form action="{{ route('grupos.store') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="materia_id">Seleccionar materia:</label>
                <select name="materia_id" id="materia_id" class="form-control">
                    @foreach ($materias as $materia)
                        <option value="{{ $materia->id }}">{{ $materia->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-success">Abrir Grupo</button>
        </form>
    </div>

    <!-- Enlaces a Bootstrap JS y jQuery (opcional) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <!-- Agrega enlaces a tus scripts JS aquí si los tienes -->
</body>
</html>
