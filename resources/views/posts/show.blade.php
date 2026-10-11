@extends('layouts.app')

@section('title', $post->title)

@section('content')
    <a href="{{ route('posts.index') }}" class="text-decoration-none">← Kembali ke daftar</a>
    <div class="mt-3">
        <x-card>
            @if ($post->image)
                <img src="{{ asset('storage/' . $post->image) }}" alt="Gambar {{ $post->title }}"
                     class="w-100 mb-4" style="max-height:420px;object-fit:cover;border-radius:12px">
            @endif
            <p class="text-secondary small mb-2">{{ $post->created_at->format('d F Y, H:i') }}</p>
            <h1 class="fw-bold mb-4">{{ $post->title }}</h1>
            <div class="content-text">{{ $post->content }}</div>
            <hr class="my-4">
            <div class="d-flex gap-2 flex-wrap">
                <a href="{{ route('posts.edit', $post) }}" class="btn btn-primary">Edit Postingan</a>
                <form action="{{ route('posts.destroy', $post) }}" method="POST"
                      onsubmit="return confirm('Yakin ingin menghapus postingan ini?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-outline-danger">Hapus Postingan</button>
                </form>
            </div>
        </x-card>
    </div>
@endsection
