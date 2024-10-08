<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @stack('styles')
    <title>Blogool</title>
    <link rel="icon" href="{{ asset('img/favicon.png') }}" type="image/png">
    @vite(['resources/js/app.js', 'resources/css/app.css'])
</head>
<body>
    <header class="p-4" style="background-color: #F2F2F2">
        <div class="col-10 mx-auto d-flex justify-content-between align-items-center">
            <h1 class="fw-bold fs-3">B l o g o o l</h1>

            <nav class="d-flex gap-4 align-items-center ">
                <a href="{{ route('home') }}" class="text-secondary text-decoration-none link-hover">Inicio</a>
                <a href=" {{route('posts.index')}} " class="text-secondary text-decoration-none link-hover">Recientes</a>
                @if (auth()->check())
                    <a href="{{ route('profile.show', auth()->user()->id) }}" class="text-secondary text-decoration-none link-hover">Sobre mí</a>
                @endif
                    <a href="{{ route('post.create') }}" class="text-secondary text-decoration-none link-hover">Crear</a>
                
            </nav>

            <div class="d-flex align-items-center">
                @if (auth()->check())
                    <a href="{{ route('logout') }}" class="btn btn-secondary">Cerrar Sesión</a>
                @endif
            </div>
        </div>
    </header>   
    
    @yield('content')

    <footer class="p-5" style="background-color: #F2F2F2">
        <div class="col-10 mx-auto">
            <div class="row">
                <div class="col">
                    <h4 class="fs-5">Blogool</h4>
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-decoration-none text-secondary link-hover">¿Quiénes somos?</a></li>
                        <li><a href="#" class="text-decoration-none text-secondary link-hover">¿Por qué Blogool?</a></li>
                        <li><a href="#" class="text-decoration-none text-secondary link-hover">Deja tu opinion</a></li>
                    </ul>
                </div>
                <div class="col">
                    <h4 class="fs-5">Descubre</h4>
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-decoration-none text-secondary link-hover">Confianza y seguridad</a></li>
                        <li><a href="#" class="text-decoration-none text-secondary link-hover">Protección de tus datos</a></li>
                        <li><a href="#" class="text-decoration-none text-secondary link-hover">Trabaja con nosotros</a></li>
                    </ul>
                </div>
                <div class="col">
                    <h4 class="fs-5">Ayuda</h4>
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-decoration-none text-secondary link-hover">Problemas con tu cuenta</a></li>
                        <li><a href="#" class="text-decoration-none text-secondary link-hover">Problemas con la comunidad</a></li>
                        <li><a href="#" class="text-decoration-none text-secondary link-hover">Contáctanos</a></li>
                    </ul>
                </div>
                <div class="col">
                    <h4 class="fs-5">¡Síguenos!</h4>
                    <div>
                        <a href="#" class="text-decoration-none text-secondary link-hover"><i class="bi bi-instagram fs-4 me-2"></i></a>
                        <a href="#" class="text-decoration-none text-secondary link-hover"><i class="bi bi-facebook fs-4 me-2"></i></a>
                        <a href="#" class="text-decoration-none text-secondary link-hover"><i class="bi bi-twitter fs-4 me-2"></i></a>
                        <a href="#" class="text-decoration-none text-secondary link-hover"><i class="bi bi-pinterest fs-4 me-2"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    @stack('scripts')
</body>
</html>
