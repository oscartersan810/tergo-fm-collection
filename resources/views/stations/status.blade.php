@extends('layouts.app')

@section('content')
<div class="container my-5">
    <h1 class="mb-4">Estado actual de las estaciones</h1>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Estación</th>
                <th>Playlist</th>
                <th>Canción</th>
                <th>Actualizado</th>
            </tr>
        </thead>
        <tbody>
            @foreach($statuses as $status)
            <tr>
                <td>{{ $status->station->name }}</td>
                <td>{{ $status->playlist->name ?? '-' }}</td>
                <td>{{ $status->song->name ?? '-' }}</td>
                <td>{{ $status->updated_at }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection