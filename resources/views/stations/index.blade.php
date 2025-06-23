@extends('layouts.app')

@section('content')
<div class="row justify-content-center my-5">
    <div class="col-lg-10">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="display-6 fw-bold text-primary mb-0">Estaciones de Radio</h1>
            <a href="{{ route('stations.create') }}" class="btn btn-primary btn-lg shadow"><i class="bi bi-plus-circle me-1"></i> Nueva Estación</a>
        </div>
        <div class="card shadow border-0 rounded-4">
            <div class="table-responsive">
                <table class="table align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Tipo</th>
                            <th class="text-end">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($stations as $station)
                        <tr>
                            <td class="fw-semibold">{{ $station->id }}</td>
                            <td>{{ $station->name }}</td>
                            <td>
                                <span class="badge bg-{{ $station->type == 'playlist' ? 'primary' : 'success' }} bg-opacity-10 text-{{ $station->type == 'playlist' ? 'primary' : 'success' }}">
                                    {{ $station->type == 'playlist' ? 'Playlist por horas' : 'Música continua' }}
                                </span>
                            </td>
                            <td class="text-end">
                                <a href="{{ route('stations.show', $station) }}" class="btn btn-outline-success btn-sm me-1"><i class="bi bi-eye"></i></a>
                                <a href="{{ route('stations.edit', $station) }}" class="btn btn-outline-warning btn-sm me-1"><i class="bi bi-pencil"></i></a>
                                <form action="{{ route('stations.destroy', $station) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Seguro que deseas eliminar esta estación?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger btn-sm"><i class="bi bi-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection