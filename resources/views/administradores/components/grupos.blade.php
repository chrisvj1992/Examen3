<!-- Componente de gestión de grupos -->
<div class="container mt-4">
    <!-- Agregar Grupo -->
    <div class="card mb-4">
        <div class="card-body">
            <h2 class="card-title">Agregar Grupo:</h2>
            <form action="{{ route('grupos.store_admin') }}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="materia_id" class="form-label">Materia:</label>
                    <select name="materia_id" id="materia_id" class="form-select" required>
                        @foreach($materias as $materia)
                        <option value="{{ $materia->id }}">{{ $materia->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="profesor_id" class="form-label">Profesor:</label>
                    <select name="profesor_id" id="profesor_id" class="form-select" required>
                        @foreach($profesores as $profesor)
                        <option value="{{ $profesor->id }}">{{ $profesor->user->name }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Agregar Grupo</button>
            </form>
        </div>
    </div>

    <!-- Lista de Grupos -->
    <div class="card">
        <div class="card-body">
            <h2 class="card-title">Grupos Registrados:</h2>
            <ul class="list-group">
                @foreach($grupos as $grupo)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    {{ $grupo->nombre }} - Materia: {{ $grupo->materia->name }} - Profesor: {{ optional($grupo->profesor)->user->name ?? 'Sin profesor asignado' }}
                    <div>
                        <!-- Editar Grupo -->
                        <form action="{{ route('grupos.update', $grupo) }}" method="post" class="d-inline">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="materia_id" class="form-label">Materia:</label>
                                <select name="materia_id" id="materia_id" class="form-select" required>
                                    @foreach($materias as $materia)
                                    <option value="{{ $materia->id }}" {{ $grupo->materia_id == $materia->id ? 'selected' : '' }}>{{ $materia->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="profesor_id" class="form-label">Profesor:</label>
                                <select name="profesor_id" id="profesor_id" class="form-select" required>
                                    @foreach($profesores as $profesor)
                                    <option value="{{ $profesor->id }}" {{ $grupo->profesor_id == $profesor->id ? 'selected' : '' }}>{{ $profesor->user->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-sm btn-primary">Guardar Cambios</button>
                        </form>

                        <!-- Eliminar Grupo -->
                        <form action="{{ route('grupos.destroy', $grupo) }}" method="post" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                        </form>
                    </div>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
