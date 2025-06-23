<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bienvenido a tu Radio Personal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/mediaelement@4.2.16/build/mediaelementplayer.min.css">
    <link rel="stylesheet" href="https://cdn.plyr.io/3.7.8/plyr.css" />
    <style>
        .gradient-bg {
            background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%);
        }
        .card-hover {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .card-hover:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.15);
        }
        .feature-icon {
            width: 60px;
            height: 60px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.75rem;
            border-radius: 12px;
            margin-bottom: 1rem;
        }
        .btn-glow:hover {
            box-shadow: 0 0 15px rgba(0, 123, 255, 0.6);
        }
        .music-wave {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 100px;
            background: url('data:image/svg+xml;utf8,<svg viewBox="0 0 1200 120" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none"><path d="M0,0V46.29c47.79,22.2,103.59,32.17,158,28,70.36-5.37,136.33-33.31,206.8-37.5C438.64,32.43,512.34,53.67,583,72.05c69.27,18,138.3,24.88,209.4,13.08,36.15-6,69.85-17.84,104.45-29.34C989.49,25,1113-14.29,1200,52.47V0Z" fill="rgba(255,255,255,0.1)" opacity=".25"/><path d="M0,0V15.81C13,36.92,27.64,56.86,47.69,72.05,99.41,111.27,165,111,224.58,91.58c31.15-10.15,60.09-26.07,89.67-39.8,40.92-19,84.73-46,130.83-49.67,36.26-2.85,70.9,9.42,98.6,31.56,31.77,25.39,62.32,62,103.63,73,40.44,10.79,81.35-6.69,119.13-24.28s75.16-39,116.92-43.05c59.73-5.85,113.28,22.88,168.9,38.84,30.2,8.66,59,6.17,87.09-7.5,22.43-10.89,48-26.93,60.65-49.24V0Z" fill="rgba(255,255,255,0.1)" opacity=".5"/><path d="M0,0V5.63C149.93,59,314.09,71.32,475.83,42.57c43-7.64,84.23-20.12,127.61-26.46,59-8.63,112.48,12.24,165.56,35.4C827.93,77.22,886,95.24,951.2,90c86.53-7,172.46-45.71,248.8-84.81V0Z" fill="rgba(255,255,255,0.1)"/></svg>') repeat-x;
            background-size: 1200px 100px;
            opacity: 0.7;
            z-index: -1;
        }
        .live-card {
            background: rgba(255,255,255,0.95);
            border-radius: 1.5rem;
            box-shadow: 0 8px 32px rgba(0,0,0,0.12);
            margin-bottom: 2rem;
        }
        .live-title {
            color: #2575fc;
            font-weight: bold;
        }
        .live-meta {
            color: #6a11cb;
            font-size: 1.1rem;
        }
        .audio-player {
            width: 100%;
            border-radius: 1rem;
            background: #f5f7fa;
            box-shadow: 0 2px 8px rgba(106,17,203,0.08);
        }
    </style>
</head>
<body class="gradient-bg text-white min-vh-100 d-flex flex-column">
    <div class="music-wave"></div>
    <main class="container py-5 my-auto">
        <div class="row justify-content-center">
            <div class="col-lg-10 col-xl-8">
                <div class="card border-0 rounded-4 overflow-hidden card-hover mb-5">
                    <div class="card-body p-5">
                        <div class="text-center mb-5">
                            <div class="position-relative d-inline-block mb-4">
                                <i class="bi bi-vinyl-fill text-primary display-3"></i>
                                <i class="bi bi-lightning-charge-fill text-warning position-absolute bottom-0 end-0 fs-4"></i>
                            </div>
                            <h1 class="display-4 fw-bold mb-3 text-dark">¡Bienvenido a Tergo FM Collection!</h1>
                            <p class="lead text-muted mb-4">Tu centro de control para disfrutar de la mejor música</p>
                        </div>
                        <div class="row g-4 mb-5">
                            <div class="col-md-4">
                                <div class="card h-100 border-0 shadow-sm">
                                    <div class="card-body text-center p-4">
                                        <div class="feature-icon bg-primary bg-opacity-10 text-primary mx-auto">
                                            <i class="bi bi-broadcast"></i>
                                        </div>
                                        <h3 class="h5 fw-bold mb-3">Estaciones</h3>
                                        <p class="text-muted">Accede a todas tus emisoras de radio favoritas en un solo lugar.</p>
                                        <a href="{{ route('stations.index') }}" class="btn btn-outline-primary btn-sm mt-2">Explorar</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card h-100 border-0 shadow-sm">
                                    <div class="card-body text-center p-4">
                                        <div class="feature-icon bg-success bg-opacity-10 text-success mx-auto">
                                            <i class="bi bi-music-note-list"></i>
                                        </div>
                                        <h3 class="h5 fw-bold mb-3">Playlists</h3>
                                        <p class="text-muted">Crea y gestiona tus listas de reproducción personalizadas.</p>
                                        <a href="{{ route('playlists.index') }}" class="btn btn-outline-success btn-sm mt-2">Explorar</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card h-100 border-0 shadow-sm">
                                    <div class="card-body text-center p-4">
                                        <div class="feature-icon bg-warning bg-opacity-10 text-warning mx-auto">
                                            <i class="bi bi-file-earmark-music"></i>
                                        </div>
                                        <h3 class="h5 fw-bold mb-3">Canciones</h3>
                                        <p class="text-muted">Administra tu biblioteca musical y tus favoritos.</p>
                                        <a href="{{ route('songs.index') }}" class="btn btn-outline-warning btn-sm mt-2">Explorar</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-center mb-5">
                            <h2 class="h4 fw-bold text-dark mb-4">Emisoras en directo</h2>
                        </div>
                        <div class="row g-4">
                            @php
                                $statuses = \App\Models\StationStatus::with(['station', 'playlist', 'song'])->get();
                            @endphp
                            @foreach($statuses as $status)
                            <div class="col-md-6">
                                <div class="live-card p-4 mb-3">
                                    <div class="d-flex align-items-center mb-3">
                                        <i class="bi bi-broadcast text-primary fs-2 me-3"></i>
                                        <div>
                                            <div class="live-title fs-4 mb-1">{{ $status->station->name }}</div>
                                            <div class="live-meta">
                                                Playlist en directo: <span class="fw-semibold">{{ $status->playlist->name ?? '-' }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-2">
                                        <span class="fw-semibold text-dark">Canción actual:</span>
                                        <span class="text-secondary">{{ $status->song->name ?? '-' }}</span>
                                    </div>
                                    @if($status->song && $status->song->file)
                                        <audio id="radio-player-{{ $status->station->id }}" controls autoplay class="audio-player mt-2 plyr">
                                            <source src="{{ Str::startsWith($status->song->file, 'http') ? $status->song->file : asset('storage/' . $status->song->file) }}" type="audio/mpeg">
                                            Tu navegador no soporta audio.
                                        </audio>
                                        <script>
                                            document.addEventListener('DOMContentLoaded', function() {
                                                const player = new Plyr('#radio-player-{{ $status->station->id }}', {
                                                    controls: ['play', 'progress', 'current-time', 'mute', 'volume'],
                                                    autoplay: true
                                                });
                                                var seekTo = {{ $status->song_second ?? 0 }};
                                                function setSeek() {
                                                    if (player.media.readyState > 0) {
                                                        try { player.currentTime = seekTo; } catch(e) {}
                                                    } else {
                                                        player.media.addEventListener('canplay', function handler() {
                                                            try { player.currentTime = seekTo; } catch(e) {}
                                                            player.media.removeEventListener('canplay', handler);
                                                        });
                                                    }
                                                }
                                                setSeek();
                                            });
                                        </script>
                                    @else
                                        <div class="alert alert-warning mt-2">No hay audio disponible.</div>
                                    @endif
                                    <div class="mt-2 small text-muted">Actualizado: {{ $status->updated_at }}</div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <footer class="text-center text-white-50 py-4 mt-auto">
        <div class="container">
            <div class="d-flex flex-wrap justify-content-center gap-4 mb-3">
                <a href="#" class="text-white text-decoration-none"><i class="bi bi-facebook me-2"></i> Facebook</a>
                <a href="#" class="text-white text-decoration-none"><i class="bi bi-twitter-x me-2"></i> Twitter</a>
                <a href="#" class="text-white text-decoration-none"><i class="bi bi-instagram me-2"></i> Instagram</a>
                <a href="#" class="text-white text-decoration-none"><i class="bi bi-github me-2"></i> GitHub</a>
            </div>
            <div class="fw-semibold text-white">Desarrollado por Oscar Ternero &copy; {{ date('Y') }}</div>
            <div class="small opacity-75">Proyecto personal de gestión de estaciones de radio</div>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.plyr.io/3.7.8/plyr.polyfilled.js"></script>
</body>
</html>