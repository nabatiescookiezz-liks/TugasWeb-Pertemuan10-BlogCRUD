
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $pageTitle }}</title>
</head>
<body>
    <h1>{{ $pageTitle }}</h1>

    <p>{{ $welcomeMessage }}</p>

    <h2>Materi yang Dipraktikkan</h2>

    <ul>
        @foreach ($features as $feature)
            <li>{{ $feature }}</li>
        @endforeach
    </ul>

    <nav>
        <a href="/">Beranda</a> |
        <a href="/about">Tentang</a> |
        <a href="/contact">Kontak</a>
    </nav>
</body>
</html>
