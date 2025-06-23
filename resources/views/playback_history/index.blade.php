@extends('layouts.app')

@section('content')
<div class="container my-5">
    <h1 class="mb-4">Historial de reproducción</h1>
    <form method="GET" class="row g-2 mb-4">
        <div class="col-md-3">
            <select name="station_id" class="form-select">
                <option value="">Todas las estaciones</option>
                @foreach($stations as $station)
                    <option value="{{ $station->id }}" @if(request('station_id') == $station->id) selected @endif>{{ $station->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-3">
            <select name="playlist_id" class="form-select">
                <option value="">Todas las playlists</option>
                @foreach($playlists as $playlist)
                    <option value="{{ $playlist->id }}" @if(request('playlist_id') == $playlist->id) selected @endif>{{ $playlist->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-3">
            <select name="song_id" class="form-select">
                <option value="">Todas las canciones</option>
                @foreach($songs as $song)
                    <option value="{{ $song->id }}" @if(request('song_id') == $song->id) selected @endif>{{ $song->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-3 d-flex gap-2">
            <input type="date" name="from" class="form-control" value="{{ request('from') }}">
            <input type="date" name="to" class="form-control" value="{{ request('to') }}">
            <button class="btn btn-primary" type="submit">Filtrar</button>
            <a href="{{ route('playback_history.index') }}" class="btn btn-outline-secondary">Limpiar</a>
        </div>
    </form>
    <a href="{{ route('playback_history.export', request()->all()) }}" class="btn btn-outline-success mb-3">Exportar CSV</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Estación</th>
                <th>Playlist</th>
                <th>Canción</th>
                <th>Fecha y hora</th>
            </tr>
        </thead>
        <tbody>
            @forelse($histories as $history)
            <tr>
                <td>{{ $history->station->name ?? '-' }}</td>
                <td>{{ $history->playlist->name ?? '-' }}</td>
                <td>{{ $history->song->name ?? '-' }}</td>
                <td>{{ $history->played_at ? \Carbon\Carbon::parse($history->played_at)->format('d/m/Y H:i:s') : '-' }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="4" class="text-center text-muted">No hay resultados para los filtros seleccionados.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
    <div class="mt-3">
        {{ $histories->withQueryString()->links() }}
    </div>
</div>
@endsection
