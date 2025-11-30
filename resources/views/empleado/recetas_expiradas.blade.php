@extends('layouts.template')

@section('title', 'Recetas expiradas - Empleado')

@section('content')
<div class="container py-5">
    <h1 class="mb-4" style="color:#003865;">Recetas expiradas</h1>

    <p class="text-muted mb-4">
        Estas recetas excedieron el tiempo límite de recolección y fueron marcadas como expiradas.
    </p>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title mb-3">Listado de recetas expiradas</h5>

            <div class="table-responsive">
                <table class="table align-middle">
                    <thead>
                        <tr>
                            <th>Folio</th>
                            <th>Paciente</th>
                            <th>Fecha registro</th>
                            <th>Fecha recolección</th>
                            <th>Días de atraso</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($recetas as $receta)
                        <tr>
                            <td>{{ $receta->folio }}</td>
                            <td>{{ $receta->paciente_nombre }}</td>
                            <td>{{ date('Y-m-d', strtotime($receta->fecha_registro)) }}</td>
                            <td>{{ date('Y-m-d', strtotime($receta->fecha_recoleccion)) }}</td>
                            <td>{{ $receta->dias_atraso }} días</td>

                            <td>
                                <span class="badge bg-danger">Expirada</span>
                            </td>

                            <td>
                                <a href="{{ route('empleado.detalleReceta', $receta->id) }}" 
                                   class="btn btn-sm btn-outline-primary">
                                    Ver detalles
                                </a>

                                <button class="btn btn-sm btn-outline-warning ms-1">
                                    Marcar devolución completada
                                </button>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="text-center text-muted">
                                No hay recetas expiradas.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>

                </table>
            </div>
        </div>
    </div>
</div>
@endsection
