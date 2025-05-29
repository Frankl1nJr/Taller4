<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>

    {{-- ✅ Bootstrap CSS desde CDN --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    {{-- Agrega cualquier otro CSS personalizado aquí --}}
</head>
<body>
    <div class="container mt-5">
        @yield('content')
    </div>

    {{-- ✅ Bootstrap JS (opcional para interactividad) --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

