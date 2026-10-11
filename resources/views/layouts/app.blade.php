<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Blog CRUD') | Pertemuan 10</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background: #f6f7fb; color: #20243a; }
        .navbar-brand { font-weight: 800; letter-spacing: .3px; }
        .page-wrap { max-width: 1050px; }
        .post-card { border: 0; border-radius: 16px; box-shadow: 0 6px 24px rgba(20,30,60,.07); }
        .post-image { width: 100%; height: 190px; object-fit: cover; border-radius: 12px; }
        .content-text { white-space: pre-wrap; line-height: 1.8; }
        .btn { border-radius: 9px; }
    </style>
    @stack('styles')
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark" style="background:#25284a">
    <div class="container page-wrap">
        <a class="navbar-brand" href="{{ route('posts.index') }}">✦ BlogKita</a>
        <div class="ms-auto">
            <a class="btn btn-light btn-sm" href="{{ route('posts.create') }}">+ Tulis Postingan</a>
        </div>
    </div>
</nav>

<main class="container page-wrap py-4 py-md-5">
    <x-alert />
    @yield('content')
</main>

<footer class="text-center text-secondary py-4 small">Tugas Pertemuan 10 · Blog CRUD Laravel</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
@stack('scripts')
</body>
</html>
