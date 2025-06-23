<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Radio Personal')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <style>
        .gradient-bg {
            background: linear-gradient(135deg, #f5f7fa 0%, #e4e8f0 100%);
            min-height: 100vh;
        }
        .navbar-gradient {
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }
        .logo-text {
            background: linear-gradient(to right, #4b6cb7, #182848);
            -webkit-background-clip: text;
            background-clip: text;
            -webkit-text-fill-color: transparent;
            font-weight: 700;
        }
        .nav-link-custom {
            position: relative;
            padding: 0.5rem 1rem;
            font-weight: 500;
            color: #495057;
            transition: all 0.3s ease;
        }
        .nav-link-custom:hover {
            color: #4b6cb7;
        }
        .nav-link-custom.active {
            color: #4b6cb7;
            font-weight: 600;
        }
        .nav-link-custom.active::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 60%;
            height: 3px;
            background: linear-gradient(to right, #4b6cb7, #182848);
            border-radius: 3px;
        }
        .alert-success-custom {
            background: linear-gradient(to right, #d4edda, #c3e6cb);
            border-color: #b1dfbb;
            color: #155724;
        }
        .footer-custom {
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(5px);
            border-top: 1px solid rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body class="gradient-bg d-flex flex-column">
    <nav class="navbar navbar-expand-lg navbar-light navbar-gradient sticky-top py-3">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                <span class="logo-text fs-3">
                    <i class="bi bi-radio me-2"></i>TERGO COLLECTION
                </span>
            </a>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item mx-2">
                        <a href="{{ route('stations.index') }}" 
                           class="nav-link nav-link-custom @if(request()->routeIs('stations.*')) active @endif">
                           <i class="bi bi-broadcast me-1"></i> Estaciones
                        </a>
                    </li>
                    <li class="nav-item mx-2">
                        <a href="{{ route('playlists.index') }}" 
                           class="nav-link nav-link-custom @if(request()->routeIs('playlists.*')) active @endif">
                           <i class="bi bi-music-note-list me-1"></i> Playlists
                        </a>
                    </li>
                    <li class="nav-item mx-2">
                        <a href="{{ route('songs.index') }}" 
                           class="nav-link nav-link-custom @if(request()->routeIs('songs.*')) active @endif">
                           <i class="bi bi-file-earmark-music me-1"></i> Canciones
                        </a>
                    </li>
                    <li class="nav-item mx-2">
                        <a href="{{ route('schedules.index') }}" 
                           class="nav-link nav-link-custom @if(request()->routeIs('schedules.*')) active @endif">
                           <i class="bi bi-calendar-week me-1"></i> Programación
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <main class="flex-grow-1 py-4">
        <div class="container my-4">
            @if(session('success'))
                <div class="alert alert-success-custom alert-dismissible fade show rounded-3 shadow-sm">
                    <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif
            
            @yield('content')
        </div>
    </main>

    <footer class="footer-custom py-4 mt-auto">
        <div class="container text-center">
            <div class="d-flex justify-content-center gap-4 mb-3">
                <a href="#" class="text-decoration-none text-secondary">
                    <i class="bi bi-facebook fs-5"></i>
                </a>
                <a href="#" class="text-decoration-none text-secondary">
                    <i class="bi bi-twitter-x fs-5"></i>
                </a>
                <a href="#" class="text-decoration-none text-secondary">
                    <i class="bi bi-instagram fs-5"></i>
                </a>
                <a href="#" class="text-decoration-none text-secondary">
                    <i class="bi bi-github fs-5"></i>
                </a>
            </div>
            <p class="mb-0">
                <span class="fw-semibold text-primary">Desarrollado por Oscar Ternero</span> &copy; {{ date('Y') }}<br>
                <small class="text-muted">Proyecto personal de gestión de estaciones de radio</small>
            </p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>
</html>