@extends('layouts.app')

@section('title', 'Buat Postingan')

@section('content')
    <a href="{{ route('posts.index') }}" class="text-decoration-none">← Kembali ke daftar</a>
    <div class="mt-3 mb-4">
        <h1 class="fw-bold">Buat Postingan Baru</h1>
        <p class="text-secondary">Bagikan cerita atau pengetahuanmu.</p>
    </div>

    <x-card>
        <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @include('posts._form')
            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary px-4">Simpan Postingan</button>
                <a href="{{ route('posts.index') }}" class="btn btn-outline-secondary">Batal</a>
            </div>
        </form>
    </x-card>
@endsection
