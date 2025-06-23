@extends('layouts.app')

@section('content')
<div class="container my-5">
    <h1 class="mb-4">Estado de la estación: {{ $status->station->name }}</h1>
    <div class="card shadow p-4">
        <h4>Playlist actual:</h4>
        <p class="fs-5">{{ $status->playlist->name ?? '-' }}</p>
        <h4>Canción actual:</h4>
        <p class="fs-5">{{ $status->song->name ?? '-' }}</p>
        <h6 class="text-muted">Última actualización: {{ $status->updated_at }}</h6>

        @if($status->song && $status->song->file)
            <div class="mt-4">
                <h5>Reproducir canción:</h5>
                <audio controls class="w-100">
                    <source src="{{ asset('storage/' . $status->song->file) }}" type="audio/mpeg">
                    Tu navegador no soporta audio.
                </audio>
            </div>
        @endif

        @if($status->song && $status->song->jingle)
            <div class="mt-3">
                <h6>Jingle asociado:</h6>
                <audio controls class="w-100">
                    <source src="{{ asset('storage/' . $status->song->jingle) }}" type="audio/mpeg">
                    Tu navegador no soporta audio.
                </audio>
            </div>
        @endif

        <div class="mt-4">
            <form action="{{ route('station_status.next', $status->station->id) }}" method="POST" class="d-inline">
                @csrf
                <button class="btn btn-success me-2" type="submit"><i class="bi bi-skip-forward"></i> Siguiente canción</button>
            </form>
            <form action="{{ route('station_status.restart', $status->station->id) }}" method="POST" class="d-inline">
                @csrf
                <button class="btn btn-secondary" type="submit"><i class="bi bi-arrow-counterclockwise"></i> Reiniciar playlist</button>
            </form>
        </div>
    </div>
    <div class="card shadow mt-5 p-4">
        <h4 class="mb-3">Historial de reproducción</h4>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Playlist</th>
                    <th>Canción</th>
                    <th>Fecha y hora</th>
                </tr>
            </thead>
            <tbody>
                @foreach($status->station->playbackHistories()->with(['playlist', 'song'])->orderByDesc('played_at')->limit(20)->get() as $history)
                <tr>
                    <td>{{ $history->playlist->name ?? '-' }}</td>
                    <td>{{ $history->song->name ?? '-' }}</td>
                    <td>{{ $history->played_at }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <a href="{{ route('station_status.index') }}" class="btn btn-outline-primary mt-4"><i class="bi bi-arrow-left me-1"></i> Volver al listado</a>
</div>
@push('scripts')
<script>
    setTimeout(() => {
        window.location.reload();
    }, 15000); // refresca cada 15 segundos
</script>
@endpush
@endsection