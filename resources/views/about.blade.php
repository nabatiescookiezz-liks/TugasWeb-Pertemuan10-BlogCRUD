
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $pageTitle }}</title>
</head>
<body>
    <h1>{{ $pageTitle }}</h1>

    <p>Halaman ini menampilkan data mahasiswa dari array yang dikirim oleh route.</p>

    <h2>Data Mahasiswa</h2>

    <ul>
        <li>Nama: {{ $student['nama'] }}</li>
        <li>Program Studi: {{ $student['program_studi'] }}</li>
        <li>Universitas: {{ $student['universitas'] }}</li>
        <li>Angkatan: {{ $student['angkatan'] }}</li>
        <li>Hobi: {{ $student['hobi'] }}</li>
    </ul>

    <nav>
        <a href="/">Beranda</a> |
        <a href="/about">Tentang</a> |
        <a href="/contact">Kontak</a>
    </nav>
</body>
</html>
