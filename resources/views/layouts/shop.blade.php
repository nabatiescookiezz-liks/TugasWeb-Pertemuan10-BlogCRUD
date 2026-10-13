<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Nacookiez E-Commerce')</title>
    <style>
        :root{--ink:#202536;--muted:#667085;--primary:#db2777;--bg:#f7f7fb;--card:#fff;--line:#e5e7eb}
        *{box-sizing:border-box}body{margin:0;background:var(--bg);color:var(--ink);font-family:Inter,system-ui,-apple-system,sans-serif}
        a{color:var(--primary);text-decoration:none}.nav{background:#171923;color:white;padding:16px max(20px,calc((100% - 1100px)/2));display:flex;align-items:center;justify-content:space-between;gap:16px;flex-wrap:wrap}
        .nav a{color:white;margin-right:12px}.container{max-width:1100px;margin:28px auto;padding:0 18px}.card{background:var(--card);border:1px solid var(--line);border-radius:14px;padding:20px;margin-bottom:16px}
        .grid{display:grid;grid-template-columns:repeat(auto-fit,minmax(220px,1fr));gap:16px}.muted{color:var(--muted)}.btn{display:inline-block;border:0;border-radius:8px;padding:9px 13px;background:var(--primary);color:white;cursor:pointer;font:inherit}
        .btn-secondary{background:#475467}.btn-danger{background:#b42318}.field{margin-bottom:14px}label{display:block;font-weight:600;margin-bottom:6px}input,textarea,select{width:100%;padding:10px;border:1px solid #cbd5e1;border-radius:8px;font:inherit}
        .alert{padding:12px 15px;border-radius:9px;margin-bottom:16px;background:#dcfce7;color:#166534}.error{color:#b42318;font-size:.9rem}.actions{display:flex;gap:8px;align-items:center;flex-wrap:wrap}.inline{display:inline}.price{font-weight:700;font-size:1.1rem}
        @media(max-width:600px){.container{margin:18px auto}.nav{align-items:flex-start}}

        
/* Pagination daftar produk */
.pagination {
    display: flex;
    align-items: center;
    justify-content: center;
    flex-wrap: wrap;
    gap: 6px;
    margin: 20px 0;
    padding: 0;
    list-style: none;
}

.pagination li {
    margin: 0;
}

.pagination a,
.pagination span {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    min-width: 36px;
    height: 36px;
    padding: 0 10px;
    border: 1px solid #e5e7eb;
    border-radius: 8px;
    font-size: 14px;
    line-height: 1;
    text-decoration: none;
}

.pagination a {
    color: #374151;
    background: #fff;
}

.pagination a:hover {
    background: #f3f4f6;
}

.pagination [aria-current="page"] span {
    color: #fff;
    background: #2563eb;
    border-color: #2563eb;
}

.pagination [aria-disabled="true"] span {
    color: #9ca3af;
    background: #f9fafb;
}


.pagination-custom {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 12px;
    margin: 24px 0;
}

.pagination-custom .page-btn {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 36px;
    height: 36px;
    padding: 0;
    border: 1px solid var(--line);
    border-radius: 8px;
    background: white;
    color: var(--ink);
    font-size: 16px;
    line-height: 1;
    text-decoration: none;
}

.pagination-custom .page-btn:hover {
    background: #f3f4f6;
}

.pagination-custom .page-btn.disabled {
    color: #9ca3af;
    background: #f3f4f6;
}

.pagination-custom .page-info {
    font-size: 14px;
    color: var(--muted);
}

    </style>
</head>
<body>
<nav class="nav">
    <div><strong>NacookiezShop</strong> &nbsp; <a href="{{ route('products.index') }}">Produk</a></div>
    <div class="actions">
        @auth
            <span>Hai, {{ auth()->user()->name }} ({{ auth()->user()->role }})</span>
            @if(auth()->user()->role === 'admin') <a href="{{ route('admin.home') }}">Admin</a> @endif
            @if(in_array(auth()->user()->role, ['admin','editor'])) <a href="{{ route('editor.home') }}">Editor</a> @endif
            <form class="inline" method="POST" action="{{ route('logout') }}">@csrf<button class="btn btn-secondary" type="submit">Logout</button></form>
        @else
            <a href="{{ route('login') }}">Login</a> <a href="{{ route('register') }}">Register</a>
        @endauth
    </div>
</nav>
<main class="container">
    @if(session('success')) <div class="alert">{{ session('success') }}</div> @endif
    @if($errors->any())
        <div class="card"><strong>Periksa kembali input:</strong><ul>@foreach($errors->all() as $error)<li class="error">{{ $error }}</li>@endforeach</ul></div>
    @endif
    @yield('content')
</main>
</body>
</html>
