@extends('layouts.app')

@section('content')
<div class="row justify-content-center my-5">
    <div class="col-lg-6">
        <div class="card shadow border-0 rounded-4 p-4">
            <h1 class="h3 fw-bold text-center text-primary mb-4">Editar Estación</h1>
            <form action="{{ route('stations.update', $station) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="name" class="form-label fw-semibold">Nombre</label>
                    <input type="text" name="name" id="name" value="{{ old('name', $station->name) }}" class="form-control form-control-lg" required>
                </div>
                <div class="mb-4">
                    <label for="type" class="form-label fw-semibold">Tipo</label>
                    <select name="type" id="type" class="form-select form-select-lg">
                        <option value="playlist" @if($station->type == 'playlist') selected @endif>Playlist por horas</option>
                        <option value="continuous" @if($station->type == 'continuous') selected @endif>Música continua</option>
                    </select>
                </div>
                <div class="d-flex justify-content-between mt-4">
                    <button class="btn btn-warning px-4" type="submit"><i class="bi bi-save me-1"></i> Actualizar</button>
                    <a href="{{ route('stations.index') }}" class="btn btn-outline-primary px-4"><i class="bi bi-arrow-left me-1"></i> Volver</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection