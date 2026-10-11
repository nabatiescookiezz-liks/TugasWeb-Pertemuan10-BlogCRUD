
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $pageTitle }}</title>
</head>
<body>
    <h1>{{ $pageTitle }}</h1>

    <p>Berikut informasi kontak pada website tugas Laravel ini.</p>

    <ul>
        <li>Email: {{ $contact['email'] }}</li>
        <li>Lokasi: {{ $contact['lokasi'] }}</li>
    </ul>

    <nav>
        <a href="/">Beranda</a> |
        <a href="/about">Tentang</a> |
        <a href="/contact">Kontak</a>
    </nav>
</body>
</html>
