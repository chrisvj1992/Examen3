<div class="container mt-4">
    <!-- Agregar Profesor -->
    <div class="card mb-4">
        <div class="card-body">
            <h2 class="card-title" style="color: #007BFF;">Agregar Alumno:</h2>
            <form action="{{ route('profesores.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label" style="color: #007BFF;">Nombre:</label>
                    <input type="text" id="name" name="name" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label" style="color: #007BFF;">Correo Electrónico:</label>
                    <input type="email" id="email" name="email" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label" style="color: #007BFF;">Contraseña:</label>
                    <input type="password" id="password" name="password" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary" style=" border-color: #007BFF;">Agregar Alumno</button>
            </form>
        </div>
    </div>

    <!-- Lista de Profesores -->
    <div class="card" >
        <div class="card-body">
            <h2 class="card-title" style="color: #007BFF;">Alumnos Registrados:</h2>
            <ul class="list-group">
                @foreach($profesores as $profesor)
                <li class="list-group-item d-flex justify-content-between align-items-center" style="color: #007BFF;">
                    {{ $profesor->user->name }} - {{ $profesor->user->email }}
                    <div>
                        <!-- Editar Profesor -->
                        <form action="{{ route('profesores.update', $profesor->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('PUT')
                            <input type="text" id="name" name="name" value="{{ $profesor->user->name }}" class="form-control" required>
                            <input type="email" id="email" name="email" value="{{ $profesor->user->email }}" class="form-control mt-2" required>
                            <button type="submit" class="btn btn-sm btn-primary mt-2" style="background-color: #007BFF; border-color: #007BFF;">Guardar Cambios</button>
                        </form>

                        <!-- Eliminar Profesor -->
                        <form action="{{ route('profesores.destroy', $profesor->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger mt-2" style=" border-color: #007BFF;">Eliminar {{ $profesor->user->name }}</button>
                        </form>
                    </div>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
