@extends('layouts.shop')
@section('title', 'Daftar Produk')
@section('content')
<div class="actions" style="justify-content:space-between;margin-bottom:18px">
    <div><h1 style="margin-bottom:4px">Daftar Produk</h1><p class="muted">Contoh katalog e-commerce dengan data dari database.</p></div>
    @auth
        @can('create', App\Models\Product::class)
            <a class="btn" href="{{ route('products.create') }}">+ Tambah Produk</a>
        @endcan
    @endauth
</div>
<form method="GET" action="{{ route('products.index') }}" class="card">
    <label for="q">Cari nama produk</label>
    <div class="actions"><input id="q" name="q" value="{{ request('q') }}" placeholder="Contoh: headphone" style="flex:1;min-width:180px"><button class="btn" type="submit">Cari</button><a href="{{ route('products.index') }}">Reset</a></div>
</form>
<div class="grid">
@forelse($products as $product)
    <article class="card">
        <p class="muted">{{ $product->category->name ?? 'Tanpa kategori' }} · {{ $product->is_active ? 'Aktif' : 'Nonaktif' }}</p>
        <h3>{{ $product->name }}</h3>
        <p style="text-align: justify;">{{ $product->description }}</p>
        <p class="price">Rp {{ number_format((float)$product->price, 0, ',', '.') }}</p>
        <p class="muted">Stok: {{ $product->stock }}</p>
        @auth
            <div class="actions">
                @can('update', $product)<a class="btn btn-secondary" href="{{ route('products.edit', $product) }}">Edit</a>@endcan
                @can('delete', $product)
                    <form method="POST" action="{{ route('products.destroy', $product) }}" onsubmit="return confirm('Yakin ingin menghapus produk ini?')">
                        @csrf @method('DELETE')<button class="btn btn-danger" type="submit">Hapus</button>
                    </form>
                @endcan
            </div>
        @endauth
    </article>
@empty
    <div class="card">Produk tidak ditemukan.</div>
@endforelse
</div>

<div class="pagination-custom">
    @if ($products->onFirstPage())
        <span class="page-btn disabled">&lt;</span>
    @else
        <a class="page-btn" href="{{ $products->previousPageUrl() }}">&lt;</a>
    @endif

    <span class="page-info">
        Halaman {{ $products->currentPage() }} dari {{ $products->lastPage() }}
    </span>

    @if ($products->hasMorePages())
        <a class="page-btn" href="{{ $products->nextPageUrl() }}">&gt;</a>
    @else
        <span class="page-btn disabled">&gt;</span>
    @endif
</div>

@endsection

