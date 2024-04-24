<div class="container mt-4" >
    <!-- Agregar Profesor -->
    <div class="card mb-4" >
        <div class="card-body">
            <h2 class="card-title" style="color: #007BFF;">Agregar Profesor:</h2>
            <form action="{{ route('profesores.store') }}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="nombre" class="form-label" style="color: #007BFF;">Nombre:</label>
                    <input type="text" name="nombre" id="nombre" class="form-control" style=" color: #007BFF;">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label" style="color: #007BFF;">Correo Electrónico:</label>
                    <input type="email" name="email" id="email" class="form-control" style=" color: #007BFF;">
                </div>
                <div class="mb-3">
                    <label for="materia_id" class="form-label" style="color: #007BFF;">Materia:</label>
                    <select name="materia_id" id="materia_id" class="form-select" style=" color: #007BFF;">
                        @foreach($materias as $materia)
                            <option value="{{ $materia->id }}">{{ $materia->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label" style="color: #007BFF;">Contraseña:</label>
                    <input type="password" id="password" name="password" class="form-control" style="color: #007BFF;" required>
                </div>
                <button type="submit" class="btn btn-primary" style="border-color: #007BFF;">Agregar Profesor</button>
            </form>
        </div>
    </div>

    <!-- Lista de profesores -->
    <div class="card" >
        <div class="card-body">
            <h2 class="card-title" style="color: #007BFF;">Profesores Registrados:</h2>
            <ul class="list-group" style="color: #007BFF;">
                @foreach($profesores as $profesor)
                <li class="list-group-item d-flex justify-content-between align-items-center" style="color: #007BFF;">
                    {{ $profesor->user->name }} - {{ $profesor->user->email }}
                    <div>
                        <!-- Editar Profesor -->
                        <form action="{{ route('profesores.update', $profesor->id) }}" method="post" class="d-inline">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="nombre" class="form-label" style="color: #007BFF;">Nombre:</label>
                                <input type="text" name="nombre" class="form-control" value="{{ $profesor->user->name }}" style="color: #007BFF;">
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label" style="color: #007BFF;">Correo Electrónico:</label>
                                <input type="email" name="email" class="form-control" value="{{ $profesor->user->email }}" style="color: #007BFF;">
                            </div>
                            <button type="submit" class="btn btn-sm btn-primary" style="background-color: #007BFF; border-color: #007BFF;">Actualizar Profesor</button>
                        </form>

                        <!-- Eliminar Profesor -->
                        <form action="{{ route('profesores.destroy', $profesor->id) }}" method="post" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" style="background-color: #007BFF; border-color: #007BFF;">Eliminar Profesor</button>
                        </form>
                    </div>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
