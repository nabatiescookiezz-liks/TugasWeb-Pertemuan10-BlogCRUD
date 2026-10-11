@extends('layouts.app')

@section('title', 'Edit Postingan')

@section('content')
    <a href="{{ route('posts.show', $post) }}" class="text-decoration-none">← Kembali ke postingan</a>
    <div class="mt-3 mb-4">
        <h1 class="fw-bold">Edit Postingan</h1>
        <p class="text-secondary">Perbarui judul, isi, atau gambar postingan.</p>
    </div>

    <x-card>
        <form action="{{ route('posts.update', $post) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            @include('posts._form')
            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary px-4">Simpan Perubahan</button>
                <a href="{{ route('posts.show', $post) }}" class="btn btn-outline-secondary">Batal</a>
            </div>
        </form>
    </x-card>
@endsection
