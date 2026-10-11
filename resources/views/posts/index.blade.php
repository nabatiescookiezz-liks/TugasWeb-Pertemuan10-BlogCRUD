@extends('layouts.app')

@section('title', 'Daftar Postingan')

@section('content')
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-end gap-3 mb-4">
        <div>
            <p class="text-uppercase small fw-bold text-secondary mb-1">RUANG CERITA KAMU</p>
            <h1 class="fw-bold mb-1">Daftar Postingan</h1>
            <p class="text-secondary mb-0">Buat, baca, ubah, dan kelola artikelmu.</p>
        </div>
        <a href="{{ route('posts.create') }}" class="btn btn-primary px-4">+ Buat Postingan</a>
    </div>

    <form action="{{ route('posts.index') }}" method="GET" class="mb-4">
        <div class="input-group">
            <input type="search" name="search" value="{{ $search }}" class="form-control"
                   placeholder="Cari judul atau isi postingan..." aria-label="Cari postingan">
            <button class="btn btn-dark" type="submit">Cari</button>
            @if ($search)
                <a href="{{ route('posts.index') }}" class="btn btn-outline-secondary">Reset</a>
            @endif
        </div>
    </form>

    @if ($posts->count())
        <div class="row g-4">
            @foreach ($posts as $post)
                <div class="col-md-6 col-lg-4">
                    <x-card>
                        @if ($post->image)
                            <img src="{{ asset('storage/' . $post->image) }}" alt="Gambar {{ $post->title }}" class="post-image mb-3">
                        @else
                            <div class="post-image mb-3 d-flex align-items-center justify-content-center" style="background:#e8e9f7;color:#555982;font-size:2.5rem">✦</div>
                        @endif
                        <p class="small text-secondary mb-2">{{ $post->created_at->format('d M Y, H:i') }}</p>
                        <h2 class="h5 fw-bold">{{ $post->title }}</h2>
                        <p class="text-secondary">{{ \Illuminate\Support\Str::limit($post->content, 110) }}</p>
                        <div class="d-flex gap-2 flex-wrap mt-3">
                            <a href="{{ route('posts.show', $post) }}" class="btn btn-primary btn-sm">Baca</a>
                            <a href="{{ route('posts.edit', $post) }}" class="btn btn-outline-secondary btn-sm">Edit</a>
                            <form action="{{ route('posts.destroy', $post) }}" method="POST"
                                  onsubmit="return confirm('Yakin ingin menghapus postingan ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger btn-sm">Hapus</button>
                            </form>
                        </div>
                    </x-card>
                </div>
            @endforeach
        </div>
        <div class="mt-4">{{ $posts->links() }}</div>
    @else
        <x-card>
            <div class="text-center py-5">
                <div style="font-size:3rem">✎</div>
                <h2 class="h4 fw-bold mt-2">Belum ada postingan</h2>
                <p class="text-secondary">{{ $search ? 'Tidak ada hasil yang cocok dengan pencarianmu.' : 'Mulai tulis cerita atau artikel pertamamu.' }}</p>
                @unless ($search)
                    <a href="{{ route('posts.create') }}" class="btn btn-primary">Buat Postingan Pertama</a>
                @endunless
            </div>
        </x-card>
    @endif
@endsection
