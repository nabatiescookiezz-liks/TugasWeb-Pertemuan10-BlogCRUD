@extends('layouts.shop')
@section('title', 'Tambah Produk')
@section('content')
<div class="card"><h1>Tambah Produk</h1>
<form method="POST" action="{{ route('products.store') }}">@csrf @include('products._form')</form>
</div>
@endsection
